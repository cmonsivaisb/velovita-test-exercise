# Velovita Landing (Custom WordPress Theme) — Technical Test Submission

This repository contains a **custom PHP WordPress theme** built as a fast, local-friendly “Velovita-like” landing implementation (no page builders), following the requirements from **“Gara Group – WordPress Technical Test (5 hours max)”** and aligned with the **Velovita Brand Guide**.


## Local Installation (LocalWP recommended)

### Option A — LocalWP (fastest)
1. Create a new LocalWP site (any name, e.g. `velovita`).
2. Open site folder → go to:
   `app/public/wp-content/themes/`
3. Copy the theme folder:
   `velovita-theme/`
4. WP Admin → **Appearance → Themes** → Activate **Velovita Theme**
5. WP Admin → **Settings → Permalinks** → choose **Post name** → Save.

### Option B — Any local WordPress
Same steps as above, just place `velovita-theme/` into:
`wp-content/themes/`


## Using the Events CPT

1. WP Admin → **Events** → Add New
2. Fill:
   - Title, Content (description)
   - Featured image (optional)
   - **Event Details** meta box (Date, City, Video URL, CTA URL)
3. Visit:
   - Events archive: `/events`
   - Single event: `/events/<slug>`

The landing page also includes an **Events slider** (Swiper) that reads the latest Events dynamically.

---

## Using the Contact Form / Inquiries

### Where it appears
- The theme provides an auto Contact template by slug:
  - Create a page with slug `contact`
  - It will render `page-contact.php`

### Shortcode
The page uses:
[vl_contact_form title="Get in touch"]


### Where submissions are stored
- WP Admin → **Inquiries**
  - Each submission is stored as a private post of CPT `inquiry`
  - Includes submitter name, email, message, timestamp

### Email configuration
- WP Admin → **Settings → Velovita Contact**
  - Set the recipient email (admin notifications)
- Optional: both admin + user confirmation emails are supported via `wp_mail` (server must allow mail sending).

---

## Customizing Key Visuals

### Hero video
Replace:
`assets/video/hero.mp4`

Optional poster fallback:
`assets/img/hero_poster.jpg`

### Colors / typography (brand guide alignment)
- Orange accent: `#DF703D`
- Grays: used for readable neutrals and footer
- Fonts: Montserrat / Nunito (enqueued in `functions.php`)

---

## Development Notes (for reviewers)

- No builders, no theme frameworks.
- Templates are plain PHP with Bootstrap classes.
- External libs are loaded via CDN for speed and to keep the setup simple.
- Menu is dynamic via WP Menu + Walker (dropdown-ready).
- Inquiries are persisted in WP as a private CPT (`inquiry`) for easy admin testing.



Author:  Carlos Monsivais
