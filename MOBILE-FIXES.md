# Mobile Fixes Tracker

## Completed

| # | Issue | Fix | CSS Version |
|---|-------|-----|-------------|
| M1 | Hero text invisible on mobile | Fixed color contrast | 1.4 |
| M4 | Font sizes different between States We Serve and Meet the Team | Team heading matched to 52px at 1080px | 2.1 |
| M5 | Meet the Team too much vertical padding on mobile | 280px → 100px at 1080px | 2.1 |
| M6 | Carousel arrows visible on mobile | `display: none` on `.carousel-arrow` | 2.1 |
| M7 | Get in Touch too much vertical padding on mobile | 160px/200px → 80px/120px at 1080px | 2.1 |
| M8 | Carousel dot colors wrong | Black inactive (opacity 0.5), gold active pill (#d6a14f) | 2.1 |
| M10 | Footer logo/social off-center on mobile | Rewrote footer.php markup + CSS for flex centering | 2.1 |

## Other completed fixes (this session)
- Banner positioning reverted to `top: 50%; transform: translate(-50%, -50%)`
- Hero margin-top removed, restored `padding-bottom: 100vh`
- Hero text set to `bottom: 185px`
- Team button `margin-top: 1rem`
- Mobile nav padding `15px 0`, phone icon size `45px/18px`
- Banner height `275px` at 500px breakpoint (overrides.css + page-specialty-shared.css)
- Specialty page images show before text on mobile (`order: -1`)
- Section background `top: 0`, footer gap fixed with `margin-top: -60px`

## Outstanding

| # | Issue | Details |
|---|-------|---------|
| M2 | Specialties icons/text off to the left on mobile | Carousel cards use `justify-content: flex-start`, may need centering adjustment |
| M3 | Grey rectangle between "States We Serve" and "Meet the Team" | Page background showing through gap between sections |
| M9 | "Meet Our Team" page text + padding on mobile | `page-team.php` / `css/page-team.css` need mobile adjustments |
| M11 | Individual specialty pages too much padding on mobile | Specialty page templates need padding reduction at mobile breakpoints |

## General
- Keep an eye out for any other differences vs reference site (zelligcare.com)
- Apply fixes one at a time with QA (batch apply was reverted previously)
- CSS version: 2.1 (`functions.php`)
- Deploy: SFTP via expect scripts → purge Breeze cache
- Local QA: Docker at localhost:8889
