# Authentication Architecture

## Implementasi saat ini

Aplikasi menyediakan dua adapter authentication dengan business logic yang sama:

- **Web Livewire** memakai session/cookie melalui guard `web`.
- **API v1** memakai Laravel Sanctum Personal Access Token melalui `Authorization: Bearer <token>`.

Livewire component dan API controller tidak menduplikasi proses register/login. Keduanya memanggil `RegisterUser` dan `AuthenticateUser` Action. API menggunakan Form Request serta API Resource, sedangkan Livewire menangani state dan validation feedback halaman.

Token API mempunyai expiry 60 menit secara default dan ability `profile:read`. Endpoint utama berada di `/api/v1/auth`; `/api/auth` masih menjadi compatibility alias.

## Sanctum bukan JWT

Sanctum menggunakan opaque token dengan bentuk konseptual:

```text
<token-id>|<random-secret>
```

Secret diberikan sekali kepada client, sedangkan database menyimpan hash SHA-256-nya. Token tidak membawa claim user dan validasinya memerlukan database.

Kelebihannya: sederhana, mudah dicabut, dan perubahan role user dapat langsung berlaku. Kekurangannya: setiap service membutuhkan akses ke penyimpanan token atau auth service.

Implementasi sekarang masih perlu expiry token yang nyata, abilities minimum sebagai pengganti `*`, rate limit login/register, dan manajemen token per perangkat.

## Jika menggunakan JWT

JWT berbentuk:

```text
base64url(header).base64url(payload).signature
```

- **Header**: algoritma dan key identifier seperti `alg` dan `kid`.
- **Payload**: claim seperti `sub`, `iss`, `aud`, `exp`, dan scope.
- **Signature**: memastikan token berasal dari issuer dan tidak diubah.

JWT cocok ketika banyak service harus memvalidasi token secara mandiri melalui public key/JWKS. Trade-off-nya adalah revocation lebih rumit, claim dapat menjadi stale, serta key rotation dan validasi token harus dikelola dengan benar. Payload JWT di-encode, bukan otomatis dienkripsi.

Selama aplikasi masih satu Laravel monolith, JWT belum memberi keuntungan berarti. Saat dibutuhkan, gunakan Authorization Server atau Identity Provider berbasis OAuth 2.0 dan OpenID Connect, bukan membuat format JWT sendiri di controller.

## Pilihan berdasarkan kebutuhan

| Kebutuhan | Pilihan teknis |
|---|---|
| Laravel monolith/API internal | Sanctum PAT |
| SPA first-party | Sanctum session cookie + CSRF |
| Mobile application | OAuth 2.0 Authorization Code + PKCE |
| Banyak microservice | OAuth access token JWT atau token introspection |
| SSO perusahaan | OpenID Connect; SAML untuk legacy |
| Microsoft AD/Entra ID | OIDC melalui Microsoft Identity Platform |
| Service-to-service/HRIS | OAuth 2.0 Client Credentials |
| Login tahan phishing | WebAuthn/passkey + MFA |

## SSO dan Active Directory

Laravel bertindak sebagai OIDC Client, sedangkan login didelegasikan ke Entra ID, Keycloak, Okta, atau Identity Provider lain:

1. Laravel mengarahkan user ke Identity Provider.
2. User login dan menjalani MFA.
3. Identity Provider mengembalikan authorization code.
4. Backend menukar code dengan token.
5. Backend memvalidasi signature, `iss`, `aud`, `exp`, `state`, dan `nonce`.
6. Claim `sub` atau object ID dipetakan ke user lokal.
7. Laravel membuat session atau token internal.

Untuk AD on-premise, utamakan federation melalui Entra ID atau AD FS. LDAP langsung adalah opsi legacy karena aplikasi harus menangani directory credential, koneksi, failover, dan MFA. Group AD dapat menjadi input role, tetapi authorization bisnis tetap dikelola aplikasi.

## MFA

Jika memakai SSO, enrollment, challenge, recovery, dan conditional access sebaiknya ditangani Identity Provider.

Jika dikelola Laravel, password yang benar hanya menghasilkan temporary challenge. Token/session penuh diterbitkan setelah TOTP atau WebAuthn berhasil. Prioritas metode: passkey/WebAuthn, TOTP, recovery code sekali pakai, lalu SMS sebagai fallback.

Gunakan step-up authentication untuk aksi sensitif seperti perubahan rekening, approval, atau ekspor data.

## Integrasi HRIS

### HRIS memanggil aplikasi

Gunakan OAuth 2.0 Client Credentials. HRIS memperoleh access token dengan audience dan scope khusus seperti `employee:sync`. Setiap integrasi memiliki client identity sendiri agar dapat dibatasi, diaudit, dirotasi, dan dicabut.

Sanctum PAT dapat menjadi solusi transisi jika Authorization Server belum tersedia, dengan syarat satu token per service, abilities minimum, expiry, rotation, secret manager, dan audit log.

### Aplikasi memanggil HRIS

Laravel memakai service credential sendiri, bukan token login user. Access token di-cache sampai mendekati expiry. Client integrasi memerlukan timeout, retry dengan backoff, circuit breaker, idempotency key, correlation ID, dan immutable employee ID.

Sinkronisasi besar sebaiknya melalui queue. Webhook HRIS wajib memvalidasi signature dan mencegah replay menggunakan timestamp atau nonce.

## Arah keputusan

1. Hardening Sanctum selama aplikasi masih monolith.
2. Gunakan OIDC ketika SSO atau AD diperlukan.
3. Delegasikan MFA ke Identity Provider jika tersedia.
4. Gunakan Client Credentials untuk HRIS dan service-to-service.
5. Gunakan Authorization Server dan JWT ketika banyak aplikasi/service membutuhkan validasi terdistribusi.

## Referensi

- [Laravel Sanctum](https://laravel.com/docs/11.x/sanctum)
- [OAuth 2.0 Security Best Current Practice](https://www.rfc-editor.org/rfc/rfc9700.html)
- [OpenID Connect Core](https://openid.net/specs/openid-connect-core-1_0.html)
- [Microsoft Identity Platform protocols](https://learn.microsoft.com/en-us/entra/identity-platform/v2-protocols)
- [OAuth 2.0 Client Credentials](https://www.rfc-editor.org/rfc/rfc6749#section-4.4)
- [W3C Web Authentication](https://www.w3.org/TR/webauthn-3/)
