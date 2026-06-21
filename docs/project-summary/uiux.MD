# ProcureBid UI/UX Design System

## Purpose

This document defines the visual identity, color palette, UI direction, layout rules, and implementation guidance for ProcureBid.

Use this file as design context when generating Blade, Livewire, AlpineJS, and TailwindCSS components.

---

# Brand Identity

## Product Name

ProcureBid

## Product Positioning

Enterprise Reverse Auction Platform for Procurement & Strategic Sourcing.

## Brand Personality

- Professional
- Trustworthy
- Enterprise-grade
- Precise
- Modern
- Procurement-focused
- Audit-friendly

## Visual Direction

ProcureBid should look like a serious enterprise SaaS platform, not a consumer marketplace.

The interface should feel closer to:

- SAP Ariba
- Coupa
- Oracle Procurement Cloud
- Modern internal enterprise dashboard

Avoid overly playful UI.

---

# Color Palette

## Primary Color

Use deep navy as the primary brand color.

```css
--color-primary-900: #0F172A;
--color-primary-800: #1E293B;
--color-primary-700: #334155;
--color-primary-600: #475569;
```

Usage:

- Sidebar
- Header
- Primary text
- Navigation active state
- Important containers

---

## Accent Color

Use procurement blue for main actions.

```css
--color-accent-600: #2563EB;
--color-accent-500: #3B82F6;
--color-accent-400: #60A5FA;
```

Usage:

- Primary buttons
- Links
- Active tabs
- Focus states
- Main action highlights

---

## Success Color

Use green for valid bids, awarded auction, approved status.

```css
--color-success-600: #16A34A;
--color-success-500: #22C55E;
--color-success-100: #DCFCE7;
```

Usage:

- Winning bid
- Approved
- Qualified vendor
- Success toast

---

## Warning Color

Use amber for pending, scheduled, registration, waiting actions.

```css
--color-warning-600: #D97706;
--color-warning-500: #F59E0B;
--color-warning-100: #FEF3C7;
```

Usage:

- Pending status
- Scheduled auction
- Registration open
- Warning alert

---

## Danger Color

Use red for rejected, cancelled, eliminated, invalid bid.

```css
--color-danger-600: #DC2626;
--color-danger-500: #EF4444;
--color-danger-100: #FEE2E2;
```

Usage:

- Rejected
- Cancelled
- Eliminated
- Validation errors

---

## Neutral Color

```css
--color-gray-50: #F8FAFC;
--color-gray-100: #F1F5F9;
--color-gray-200: #E2E8F0;
--color-gray-300: #CBD5E1;
--color-gray-500: #64748B;
--color-gray-700: #334155;
--color-gray-900: #0F172A;
```

Usage:

- Background
- Card borders
- Table borders
- Secondary text
- Empty state

---

# Typography

## Font Recommendation

Use:

```css
font-family: Inter, ui-sans-serif, system-ui, sans-serif;
```

## Typography Scale

Page title:

```css
text-2xl font-semibold text-slate-900
```

Section title:

```css
text-lg font-semibold text-slate-900
```

Card title:

```css
text-base font-semibold text-slate-900
```

Body:

```css
text-sm text-slate-700
```

Muted text:

```css
text-sm text-slate-500
```

Table text:

```css
text-sm text-slate-700
```

---

# Layout System

## Application Layout

Use a classic enterprise dashboard layout.

Structure:

```text
Sidebar | Main Content
        | Topbar
        | Page Content
```

## Sidebar

Width:

```css
w-64
```

Style:

```css
bg-slate-950 text-slate-200
```

Sidebar sections:

- Dashboard
- Auctions
- Vendors
- Buyer Management
- Reports
- Audit Logs
- Settings

Active menu:

```css
bg-blue-600 text-white
```

Inactive menu:

```css
text-slate-300 hover:bg-slate-800 hover:text-white
```

---

# Page Templates

## 1. Dashboard Page

Purpose:

Show procurement and auction summary.

Components:

- Summary cards
- Active auctions table
- Recent bid activity
- Auction status chart
- Vendor participation summary

Cards:

- Total Auctions
- Active Auctions
- Awarded Auctions
- Registered Vendors
- Total Savings Estimate

---

## 2. Auction List Page

Purpose:

Display all auctions with filter and status.

Components:

- Page header
- Create Auction button
- Filter bar
- Auction table
- Pagination

Table columns:

- Auction Number
- Title
- Auction Type
- Status
- Start Time
- End Time
- Participants
- Current Best Bid
- Action

Status badge colors:

- Draft: gray
- Published: blue
- Registration Open: amber
- Live: green
- Closed: slate
- Awarded: blue
- Cancelled: red

---

## 3. Auction Create/Edit Page

Purpose:

Buyer creates or edits auction.

Sections:

1. Basic Information
2. Auction Configuration
3. Items / Scope of Work
4. Vendor Invitation
5. Schedule
6. Review

Recommended layout:

- Use card-based form sections
- Use two-column layout where appropriate
- Keep critical auction configuration visually separated

---

## 4. Buyer Auction Room

Purpose:

Buyer monitors live auction.

Layout:

```text
Top Summary
Live Ranking Table
Bid Activity Feed
Participant Panel
Auction Control Panel
```

Components:

- Current Best Bid
- Remaining Time
- Active Vendors
- Total Bid Count
- Live Ranking
- Bid Timeline
- Pause / Close Auction actions

Important:

Buyer can see all participants and ranking.

---

## 5. Vendor Auction Room

Purpose:

Vendor submits bid during live auction.

Layout:

```text
Auction Summary
Current Best Price
Bid Submission Form
Own Bid History
Auction Timer
Status Panel
```

Components:

- Current leading price
- Minimum allowed bid
- Bid input
- Submit bid button
- Own rank if allowed
- Countdown timer
- Own bid history

Important:

Vendor must not see other vendor identities.

Vendor may see rank only if auction configuration allows it.

---

## 6. Auction Result Page

Purpose:

Display final result after closing.

Components:

- Winner summary
- Final ranking
- Bid history
- Award action
- Export result
- Audit timeline

---

## 7. Auction Replay Page

Purpose:

Replay auction events from audit logs.

Components:

- Timeline player
- Event list
- Bid movement chart
- Winner determination point
- Participant activity

This page is intended as a showcase feature.

---

# Component Style Guide

## Button

Primary:

```html
<button class="inline-flex items-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
    Submit
</button>
```

Secondary:

```html
<button class="inline-flex items-center rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">
    Cancel
</button>
```

Danger:

```html
<button class="inline-flex items-center rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">
    Reject
</button>
```

---

## Card

```html
<div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
    <!-- content -->
</div>
```

---

## Input

```html
<input
    type="text"
    class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-900 placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500"
/>
```

---

## Status Badge

```html
<span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium">
    Status
</span>
```

Examples:

```text
Draft: bg-slate-100 text-slate-700
Live: bg-green-100 text-green-700
Scheduled: bg-amber-100 text-amber-700
Cancelled: bg-red-100 text-red-700
Awarded: bg-blue-100 text-blue-700
```

---

# Livewire Component Naming

Use clear and domain-oriented names.

Examples:

```text
Dashboard\AuctionSummaryCards
Auction\AuctionTable
Auction\AuctionForm
Auction\BuyerAuctionRoom
Auction\VendorAuctionRoom
Auction\BidForm
Auction\BidHistory
Auction\RankingTable
Auction\AuctionTimer
Auction\AuctionReplay
Vendor\VendorRegistrationForm
Audit\AuditTimeline
```

---

# Figma Frame Structure

Create these frames in Figma:

```text
01 - Dashboard
02 - Auction List
03 - Create Auction
04 - Buyer Auction Room
05 - Vendor Auction Room
06 - Auction Result
07 - Auction Replay
08 - Vendor Management
09 - Audit Logs
```

## Figma Layout Rules

Desktop frame:

```text
1440 x 1024
```

Spacing:

```text
8px grid system
```

Container:

```text
24px page padding
```

Card radius:

```text
12px
```

Button radius:

```text
8px
```

Sidebar width:

```text
256px
```

Topbar height:

```text
64px
```

---

# UX Rules

## Auction Room

Must prioritize:

- Current price visibility
- Remaining time visibility
- Bid action clarity
- Error feedback
- Network/realtime status

## Bid Submission

Always show:

- Current best price
- Minimum allowed bid
- Vendor input bid
- Validation message
- Confirmation before submit

## Vendor Privacy

Do not expose other vendor identity in vendor view.

Allowed:

- Rank
- Anonymous competitor position
- Current leading price

Not allowed:

- Vendor name
- Vendor email
- Company identity
- Internal buyer notes

---

# Codex Prompt for UI Generation

Use this prompt when asking Codex to generate UI.

```md
Implement the UI based on ProcureBid UI/UX Design System.

Stack:
- Laravel Blade
- Livewire 3
- AlpineJS
- TailwindCSS

Scope:
[describe page or component]

Rules:
- Follow color palette
- Follow enterprise SaaS layout
- Use reusable Livewire components
- Use TailwindCSS only
- Do not use React
- Do not use Bootstrap
- Do not modify unrelated files
- Include loading, empty, error, and unauthorized states
- Keep vendor identity hidden in vendor auction room

Output:
- Implementation plan
- Components to create
- Blade/Livewire code
- Changed files summary
```
