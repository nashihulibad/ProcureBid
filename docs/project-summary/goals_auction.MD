# ProcureBid - Livewire Edition

## Stack

### Backend
- Laravel 11
- PHP 8.3

### Frontend
- Blade
- Livewire
- AlpineJS
- TailwindCSS

### Realtime
- Laravel Reverb
- Laravel Echo

### Database
- MySQL

### Queue
- Redis
- Laravel Queue

---

# Phase 1 - Foundation

Setup:

- Laravel 11
- Livewire
- AlpineJS
- TailwindCSS
- MySQL
- Redis
- Docker

Commit:
chore: setup project foundation

---

# Phase 2 - Authentication & RBAC

Roles:

- Admin
- Buyer
- Vendor

Features:

- Sanctum
- Roles
- Permissions
- Policies

Commit:
feat: authentication and rbac

---

# Phase 3 - Auction Schema

Tables:

- auctions
- auction_items
- auction_participants
- auction_bids
- auction_results
- auction_audit_logs

Commit:
feat: auction schema

---

# Phase 4 - Auction Management

Features:

- Create Auction
- Update Auction
- View Auction
- Publish Auction
- Cancel Auction

Commit:
feat: auction management

---

# Phase 5 - Vendor Participation

Features:

- Registration
- Qualification
- Rejection
- Participant Status

Commit:
feat: vendor participation

---

# Phase 6 - English Reverse Auction

Features:

- Bid Submission
- Lowest Bid Tracking
- Minimum Decrement Validation
- Realtime Ranking
- Audit Log

Commit:
feat: english reverse auction

---

# Phase 7 - Live Auction Room

Buyer Components:

- AuctionDashboard
- ParticipantTable
- RankingTable

Vendor Components:

- AuctionRoom
- BidForm
- AuctionTimer
- BidHistory

Stack:

- Livewire 3
- AlpineJS
- Laravel Echo
- Laravel Reverb

Commit:
feat: live auction room

---

# Phase 8 - Auction Closing

Features:

- Close Auction
- Winner Calculation
- Publish Result

Commit:
feat: auction closing

---

# Phase 8A - Auction Replay

Features:

- Replay Timeline
- Replay Bid History
- Replay Winner Determination

Source:

- auction_audit_logs

Commit:
feat: auction replay

---

# Phase 9 - Japanese Reverse Auction

Features:

- Auto Price Decrement
- Stay / Exit Mechanism
- Vendor Elimination

Commit:
feat: japanese reverse auction

---

# Phase 10 - Dutch Reverse Auction

Features:

- Auto Price Decrement
- First Acceptance Wins

Commit:
feat: dutch reverse auction

---

# Phase 11 - Dashboard & Reporting

Features:

- Auction Dashboard
- Bid Analytics
- Vendor Analytics
- Winner Analytics

Commit:
feat: dashboard and reporting

---

# Phase 12 - Hardening

Focus:

- Security Review
- Performance Review
- Query Optimization
- Authorization Review
- Test Coverage Review

Commit:
chore: hardening

---

# MVP Stop Point

If Codex quota is limited, stop after:

- Phase 1
- Phase 2
- Phase 3
- Phase 4
- Phase 5
- Phase 6
- Phase 7
- Phase 8

This is already a complete production-ready MVP.
