# PHP 8 + CodeIgniter 3 Upgrade: Testing Checklist

**Date:** February 18, 2026  
**Scope:** Verify CodeIgniter 2.2.6 → 3.1.11 + PHP 8 upgrade is production-ready  
**Estimated Time:** 30-45 minutes for full validation  

---

## Pre-Testing Setup

### 1. Prerequisites Check

- [ ] Windows WAMP/server running on PHP 8.x (verify: `php -v`)
- [ ] MySQL/MariaDB service running
- [ ] Traffic redirecting to `c:\wamp64\www\cf_motogarahe\` via local/domain
- [ ] Composer dependencies installed: `vendor/phpoffice/phpspreadsheet/` exists
- [ ] `.gitignore` configured to ignore `vendor/`, `application/cache/`, `application/logs/`

### 2. Environment Verification

```bash
# Run these commands in PowerShell at project root:
php -v                                    # Should show PHP 8.x.x
php -m | Select-String -Pattern "mysqli" # Should show mysqli available
composer --version                        # Should show Composer 2.x
```

---

## Phase 1: Application Startup & Bootstrap

### 1.1 Homepage Load

- [ ] **Test:** Open browser to `http://localhost/cf_motogarahe/`
- [ ] **Expected:** Homepage loads without 500/502 errors
- [ ] **Check:** No PHP notices/warnings in browser output
- [ ] **Verify:** `application/logs/log-YYYY-MM-DD.php` shows no critical errors
- [ ] **Pass/Fail:** ___

**Notes:** _________________________________________________________________

---

### 1.2 Database Connection

- [ ] **Test:** Load any page that queries database (e.g., motorcycles list)
- [ ] **Expected:** Database results display correctly
- [ ] **Check:** No "connection refused" or "table not found" errors
- [ ] **Verify:** Query execution time is reasonable (<500ms)
- [ ] **Pass/Fail:** ___

**Notes:** _________________________________________________________________

---

## Phase 2: Authentication & Session Management

### 2.1 User Login (Admin)

- [ ] **Test:** Navigate to admin login (typically `/admin/login` or `/login`)
- [ ] **Expected:** Login form displays and is functional
- [ ] **Check:** Login with valid credentials (admin/password)
- [ ] **Verify:** Session is created and persists across page navigation
- [ ] **Pass/Fail:** ___

**Notes:** _________________________________________________________________

---

### 2.2 Session Persistence

- [ ] **Test:** After login, navigate to 3 different admin pages
- [ ] **Expected:** Logged-in state persists (no random logouts)
- [ ] **Check:** Session cookie is set and not expired
- [ ] **Verify:** `$_SESSION` variables accessible in controllers
- [ ] **Pass/Fail:** ___

**Notes:** _________________________________________________________________

---

### 2.3 Logout

- [ ] **Test:** Click logout or manually destroy session
- [ ] **Expected:** Redirected to login page
- [ ] **Check:** Session cookie cleared, can't access protected pages
- [ ] **Verify:** No session data accessible after logout
- [ ] **Pass/Fail:** ___

**Notes:** _________________________________________________________________

---

## Phase 3: Database QueryBuilder (CI3 Migration)

### 3.1 SELECT Queries

- [ ] **Test:** Load page with `$this->db->get()` query (e.g., motorcycles list)
- [ ] **Expected:** Results display correctly
- [ ] **Check:** No "Call to undefined method" errors
- [ ] **Verify:** No difference in result count vs. old CI2 (use `$this->db->last_query()` to debug)
- [ ] **Pass/Fail:** ___

**Notes:** _________________________________________________________________

---

### 3.2 WHERE Conditions

- [ ] **Test:** Filter results with WHERE conditions (e.g., vehicles by dealer)
- [ ] **Expected:** Filtered results are correct
- [ ] **Check:** Multiple WHERE conditions work (e.g., dealer_id AND status)
- [ ] **Verify:** LIKE, IN, and comparison operators all work
- [ ] **Pass/Fail:** ___

**Notes:** _________________________________________________________________

---

### 3.3 INSERT/UPDATE Queries

- [ ] **Test:** Create or update a record (in admin if available)
- [ ] **Expected:** Record is inserted/updated without errors
- [ ] **Check:** No "Syntax error in SQL query" messages
- [ ] **Verify:** Timestamps are correct, data integrity intact
- [ ] **Pass/Fail:** ___

**Notes:** _________________________________________________________________

---

### 3.4 JOIN Queries

- [ ] **Test:** Run page with JOINs (e.g., motorcycles + dealers + brands)
- [ ] **Expected:** All joined data displays correctly
- [ ] **Check:** No NULL values where data should exist
- [ ] **Verify:** INNER JOIN, LEFT JOIN both work correctly
- [ ] **Pass/Fail:** ___

**Notes:** _________________________________________________________________

---

## Phase 4: Core Controller Functionality

### 4.1 Helper Functions

- [ ] **Test:** Pages using helper functions (form, url, etc. helpers)
- [ ] **Expected:** No "Call to undefined function" errors
- [ ] **Check:** Form inputs, buttons, links generate correct HTML
- [ ] **Verify:** Auto-loaded helpers working reliably
- [ ] **Pass/Fail:** ___

**Notes:** _________________________________________________________________

---

### 4.2 Library Loading

- [ ] **Test:** Pages loading custom libraries (`$this->load->library()`)
- [ ] **Expected:** No "Unable to load..." errors
- [ ] **Check:** Multiple library loads on same page work
- [ ] **Verify:** Library methods callable and returning correct data
- [ ] **Pass/Fail:** ___

**Notes:** _________________________________________________________________

---

### 4.3 Model Usage

- [ ] **Test:** Pages calling `$this->load->model()` and methods
- [ ] **Expected:** Model methods execute without errors
- [ ] **Check:** Returned data structure matches expectations
- [ ] **Verify:** Multiple models on same page load correctly
- [ ] **Pass/Fail:** ___

**Notes:** _________________________________________________________________

---

## Phase 5: Spreadsheet Export (PHPExcel → PhpSpreadsheet Wrapper)

### 5.1 Excel Export Endpoints

**Critical:** These endpoints use PHPExcel compatibility wrapper.

#### 5.1.1 Dealer/Inquiries Export

- [ ] **URL (test):** `http://localhost/cf_motogarahe/dealer/inquiries/dealers_inquirydownload?downloadall=true`
- [ ] **Expected:** Browser triggers CSV/Excel download
- [ ] **Check:** File is not empty and contains correct headers/data
- [ ] **Verify:** Excel can open file without corruption warnings
- [ ] **Pass/Fail:** ___

**Notes:** _________________________________________________________________

---

#### 5.1.2 Dealer/Repoinquiries Export

- [ ] **URL (test):** `http://localhost/cf_motogarahe/dealer/repoinquiries/export`
- [ ] **Expected:** Browser downloads Excel file
- [ ] **Check:** File contains expected columns and rows
- [ ] **Verify:** Data matches what's shown in web interface
- [ ] **Pass/Fail:** ___

**Notes:** _________________________________________________________________

---

#### 5.1.3 Admin/Dealers_motorcycles Export

- [ ] **URL (test):** `http://localhost/cf_motogarahe/admin/dealers_motorcycles/export` (if exists)
- [ ] **Expected:** Download works without 500 error
- [ ] **Check:** File format (CSV/Excel) matches expectation
- [ ] **Verify:** Data integrity (no truncated cells, correct formatting)
- [ ] **Pass/Fail:** ___

**Notes:** _________________________________________________________________

---

#### 5.1.4 Admin/Sales Export

- [ ] **URL (test):** `http://localhost/cf_motogarahe/admin/sales/export` (if exists)
- [ ] **Expected:** Export succeeds
- [ ] **Check:** File is readable and valid
- [ ] **Verify:** Sales data is complete and accurate
- [ ] **Pass/Fail:** ___

**Notes:** _________________________________________________________________

---

### 5.2 Compatibility Wrapper Verification

- [ ] **Check:** `application/libraries/Excel_compat.php` is being used
- [ ] **Verify:** `$config['composer_autoload']` is enabled in `config.php`
- [ ] **Test:** Run `scripts/test_excel_compat.php` — should show `PHPExcel exists: bool(true)`
- [ ] **Pass/Fail:** ___

---

## Phase 6: Forms & Input Validation

### 6.1 Form Submission

- [ ] **Test:** Submit a form (login, contact, etc.)
- [ ] **Expected:** Form processes without CSRF token errors
- [ ] **Check:** CSRF token is generated and validated correctly
- [ ] **Verify:** Form validation rules are applied consistently
- [ ] **Pass/Fail:** ___

**Notes:** _________________________________________________________________

---

### 6.2 Input Sanitization

- [ ] **Test:** Submit form with XSS/SQL injection payloads (malicious input)
- [ ] **Expected:** Input is sanitized without breaking legitimate content
- [ ] **Check:** No errors from `htmlspecialchars()` or filtering functions
- [ ] **Verify:** Legitimate special characters (e.g., apostrophes) handled correctly
- [ ] **Pass/Fail:** ___

**Notes:** _________________________________________________________________

---

## Phase 7: Static Assets & Routing

### 7.1 CSS/JS Loading

- [ ] **Test:** Check network tab in browser (F12 → Network)
- [ ] **Expected:** All CSS/JS files load with 200 status
- [ ] **Check:** No 404 errors for images, stylesheets, scripts
- [ ] **Verify:** Page styling is applied correctly
- [ ] **Pass/Fail:** ___

**Notes:** _________________________________________________________________

---

### 7.2 URL Routing

- [ ] **Test:** Navigate using internal links (not direct URLs)
- [ ] **Expected:** All links route correctly to their destinations
- [ ] **Check:** Dynamic routes (e.g., `/motorcycles/{id}`) work
- [ ] **Verify:** 404 pages display for non-existent routes
- [ ] **Pass/Fail:** ___

**Notes:** _________________________________________________________________

---

## Phase 8: Error Handling & Logging

### 8.1 Error Logging

- [ ] **Check:** `application/logs/log-*.php` exists and is being written
- [ ] **Verify:** No PHP Notice/Warning/Error messages in logs
- [ ] **Test:** Trigger an intentional error (e.g., non-existent page)
- [ ] **Expected:** Error is logged with timestamp, severity, message
- [ ] **Pass/Fail:** ___

**Notes:** _________________________________________________________________

---

### 8.2 404 Handling

- [ ] **Test:** Navigate to non-existent page (e.g., `/fakeroute`)
- [ ] **Expected:** Custom 404 page displays (not blank page or raw error)
- [ ] **Check:** HTTP status code is 404 (in network panel)
- [ ] **Verify:** 404 page contains helpful message/navigation
- [ ] **Pass/Fail:** ___

**Notes:** _________________________________________________________________

---

### 8.3 Error Hooks

- [ ] **Test:** Page that might cause a DB error (bad query)
- [ ] **Expected:** Error caught and logged gracefully (no white screen of death)
- [ ] **Check:** User sees user-friendly error page, not raw SQL
- [ ] **Verify:** Admin/developer can see detailed error in logs
- [ ] **Pass/Fail:** ___

**Notes:** _________________________________________________________________

---

## Phase 9: Performance Baseline

### 9.1 Page Load Time

- [ ] **Test:** Open 5 popular pages, note load times in browser DevTools
- [ ] **Expected:** Page load < 2 seconds (target <1s for static pages)
- [ ] **Check:** No unusual delays from database queries
- [ ] **Record:** Baseline times for future comparison
  - Homepage: ___ ms
  - Motorcycles List: ___ ms
  - Dealer List: ___ ms
  - Admin Dashboard: ___ ms
  - Export Page: ___ ms

**Notes:** _________________________________________________________________

---

### 9.2 Database Query Performance

- [ ] **Test:** Enable CI query profiler (`$config['log_threshold'] = 4`)
- [ ] **Expected:** Queries execute in <100ms each
- [ ] **Check:** No N+1 queries (multiple queries in loop)
- [ ] **Verify:** Complex JOINs are efficient
- [ ] **Pass/Fail:** ___

**Notes:** _________________________________________________________________

---

## Phase 10: Browser Compatibility

### 10.1 Chrome/Edge (Modern)

- [ ] **Test:** Open site in Chrome or Edge (latest version)
- [ ] **Expected:** All features work, no console errors
- [ ] **Check:** No JavaScript errors in console (F12)
- [ ] **Verify:** Responsive design works (test mobile viewport)
- [ ] **Pass/Fail:** ___

---

### 10.2 Firefox

- [ ] **Test:** Open site in Firefox (latest version)
- [ ] **Expected:** All features work identically to Chrome
- [ ] **Check:** No console warnings or errors
- [ ] **Verify:** Forms, downloads, exports all work
- [ ] **Pass/Fail:** ___

---

## Summary & Sign-Off

### Tally Results

| Phase | Tests | Passed | Failed |
|-------|-------|--------|--------|
| 1. Startup | 2 | ___ | ___ |
| 2. Auth & Sessions | 3 | ___ | ___ |
| 3. QueryBuilder | 4 | ___ | ___ |
| 4. Controllers | 3 | ___ | ___ |
| 5. Spreadsheet Export | 5 | ___ | ___ |
| 6. Forms | 2 | ___ | ___ |
| 7. Assets & Routing | 2 | ___ | ___ |
| 8. Error Handling | 3 | ___ | ___ |
| 9. Performance | 2 | ___ | ___ |
| 10. Browser Compat | 2 | ___ | ___ |
| **TOTAL** | **28** | **___** | **___** |

### Overall Status

- [ ] **PASS** — Ready for production deployment
- [ ] **PASS WITH WARNINGS** — Minor issues found; document in deployment notes
- [ ] **FAIL** — Critical issues found; see failure log below

### Issues Found

1. **Issue:** ___________________________________________________________
   - **Severity:** High / Medium / Low
   - **Resolution:** ____________________________________________________
   - **Status:** Closed / Open / Deferred

2. **Issue:** ___________________________________________________________
   - **Severity:** High / Medium / Low
   - **Resolution:** ____________________________________________________
   - **Status:** Closed / Open / Deferred

3. **Issue:** ___________________________________________________________
   - **Severity:** High / Medium / Low
   - **Resolution:** ____________________________________________________
   - **Status:** Closed / Open / Deferred

### Deployment Readiness

**Tested By:** _________________  
**Date/Time:** _________________  
**Version Verified:** CI 3.1.11 + PHP 8.x.x  
**Sign-Off:** ☐ Ready | ☐ Not Ready | ☐ Conditional  

**Notes:** ____________________________________________________________________

---

## Quick Reference: Commands & URLs

### Useful Debug Commands

```bash
# Check CI version
php -r "echo file_get_contents('system/core/CodeIgniter.php') | grep CI_VERSION;"

# Check PHP version
php -v

# Check database connection
php -r "require 'application/config/database.php'; echo 'Current DB: ' . $db['default']['database'];"

# Test Excel wrapper
php scripts/test_excel_compat.php

# View recent logs
Get-ChildItem -Path "application/logs" | Sort-Object -Property LastWriteTime -Descending | Select-Object -First 1 | ForEach-Object { Get-Content $_.FullName | Select-Object -Last 20 }
```

### Key Test URLs

```
Homepage:              http://localhost/cf_motogarahe/
Admin Login:           http://localhost/cf_motogarahe/admin/login
Motorcycles List:      http://localhost/cf_motogarahe/motorcycles
Dealer Inquiries:      http://localhost/cf_motogarahe/dealer/inquiries
Inquiries Export:      http://localhost/cf_motogarahe/dealer/inquiries/dealers_inquirydownload?downloadall=true
Repo Inquiries Export: http://localhost/cf_motogarahe/dealer/repoinquiries/export
Contact Form:          http://localhost/cf_motogarahe/contact_us
```

---

**Document Created:** February 18, 2026  
**Last Updated:** February 18, 2026  
**Status:** Ready for execution
