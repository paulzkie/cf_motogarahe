# Rollback Plan: CodeIgniter 2.2.6 ← CodeIgniter 3.1.11 + PHP 8

**Last Updated:** February 18, 2026  
**Target:** Restore to CodeIgniter 2.2.6 configuration  
**Estimated Rollback Time:** ~5-10 minutes

---

## Overview

If the PHP 8 + CI3 upgrade introduces critical issues, follow these steps to restore the previous configuration. A complete backup of the original `system/` folder has been preserved.

---

## Rollback Steps

### Step 1: Restore CodeIgniter Core (CRITICAL)

The original `system/` folder (CI 2.2.6) is backed up as `system_backup_20260218000052`.

```bash
# Navigate to project root
cd C:\wamp64\www\cf_motogarahe

# Remove current CI 3 system folder
rmdir /s /q system

# Restore original CI 2.2.6
ren system_backup_20260218000052 system

# Verify restoration
ls system/core/CodeIgniter.php  # Should show CI_VERSION = '2.2.6'
```

### Step 2: Revert Configuration Files

#### `application/config/database.php`

```php
// CHANGE THIS:
$query_builder = TRUE;

// BACK TO THIS:
$active_record = TRUE;
```

**Command:**
```bash
git checkout application/config/database.php
# OR manually edit and replace $query_builder with $active_record
```

#### `application/config/config.php`

```php
// REMOVE OR CHANGE THIS:
$config['composer_autoload'] = (defined('FCPATH') ? FCPATH . 'vendor/autoload.php' : FALSE);

// BACK TO THIS:
$config['composer_autoload'] = FALSE;
```

**Command:**
```bash
git checkout application/config/config.php
```

### Step 3: Revert Library Changes

#### `application/libraries/Excel.php`

```php
// CHANGE THIS:
require_once APPPATH."/libraries/Excel_compat.php";

// BACK TO THIS:
require_once APPPATH."/third_party/PHPExcel.php";
```

**Command:**
```bash
git checkout application/libraries/Excel.php
```

### Step 4: Revert PHP 5 → PHP 8 Modernizations (Optional)

If the app has issues with `public $property` declarations, revert them to `var $property`:

**Affected files (use Git to revert):**
```bash
git checkout \
  application/libraries/Googlemaps.php \
  application/libraries/Googlemaps_july22_2020.php \
  application/libraries/__Googlemaps.php \
  application/third_party/PHPExcel/Reader/Excel5.php \
  application/third_party/PHPExcel/Writer/OpenDocument/Content.php \
  application/views/newui/site/mgclub.php
```

**Or:** Manually replace `public $` back to `var $` in each file (search-replace).

### Step 5: Revert Composer Changes (Optional)

If PhpSpreadsheet compatibility causes issues:

```bash
# Remove PhpSpreadsheet
composer remove phpoffice/phpspreadsheet

# Remove conversion scripts (if desired)
rm scripts/convert_var_to_public.php
rm scripts/test_excel_compat.php
```

### Step 6: Switch PHP Version (if running locally)

```bash
# If using WAMP/XAMPP, switch back to PHP 7.x
# Example (WAMP): Right-click WAMP menu → PHP → Select PHP version
# Example (via terminal): Set environment PHP_VERSION env var or change php.ini
```

### Step 7: Clear Caches (Important)

```bash
# Clear CodeIgniter cache
rm -r application/cache/*

# Clear Composer autoload cache
composer dump-autoload

# Clear browser cache (Ctrl+Shift+Delete in browser)
```

---

## Verification After Rollback

### Quick Checks

```bash
# 1. Verify CI version
php -r "define('BASEPATH', 1); require('system/core/CodeIgniter.php'); echo CI_VERSION;"
# Expected output: 2.2.6

# 2. Verify config
grep 'active_record' application/config/database.php
# Expected: $active_record = TRUE;

# 3. Verify Excel library
grep 'third_party/PHPExcel' application/libraries/Excel.php
# Expected: require_once APPPATH."/third_party/PHPExcel.php";

# 4. Test database connection
mysql -u<user> -p<pass> -h<host> <dbname> -e "SELECT 1;"
# Expected: 1
```

### Full App Test

1. **Login to admin/dealer dashboard** → verify no 500 errors
2. **Export spreadsheet** (if applicable) → verify CSV/Excel download works
3. **Database queries** → Run a sample report or list view
4. **Check logs** → Review `application/logs/` for errors

---

## If Issues Persist After Rollback

### Check Application Logs

```bash
# View most recent errors
tail -n 50 application/logs/log-*.php
```

### Common Issues

| Issue | Solution |
|-------|----------|
| "Class 'PHPExcel' not found" | Verify `application/third_party/PHPExcel.php` exists |
| Database connection fails | Check `application/config/database.php` has `$active_record = TRUE;` |
| Sessions/cache errors | Clear `application/cache/` and `application/logs/` |
| PHP version mismatch | Use `php -v` to verify; ensure WAMP/server is running correct version |

### Manual Verification Checklist

- [ ] System restored to correct directory
- [ ] database.php uses `$active_record`
- [ ] config.php has `composer_autoload = FALSE`
- [ ] Excel.php requires `third_party/PHPExcel.php`
- [ ] All `var $` properties reverted in affected files
- [ ] Cache directories cleared
- [ ] Web server restarted
- [ ] Database connection test passed
- [ ] Admin login works
- [ ] Export/spreadsheet flows work

---

## Emergency Contact / Support

**If rollback does not resolve issues:**

1. Check Git history: `git log --oneline | head -20`
2. Review changes: `git diff HEAD~5..HEAD`
3. Restore full backup if available: `git reset --hard <commit-hash>`
4. Check server PHP/MySQL versions: `php -v && mysql -V`

---

## Prevention for Future Upgrades

1. **Commit all changes to Git** before major upgrades
2. **Create database snapshots** before testing
3. **Test on staging environment first**
4. **Keep comprehensive logs** of what was changed
5. **Document rollback instructions** immediately after upgrade (as done here)

---

**Document Created:** February 18, 2026  
**Status:** Ready for use if rollback needed  
**Estimated Success Rate:** 95%+ (all changes are reversible)

