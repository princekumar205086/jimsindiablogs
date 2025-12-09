# Laravel 12 Upgrade Notes

## Upgrade Summary
The project has been successfully upgraded from Laravel 10 to Laravel 12.

## Package Updates

### Core Laravel Packages
- **Laravel Framework**: `^10.48.29` → `^12.0` (v12.42.0 installed)
- **Laravel Tinker**: `^2.8.1` → `^2.10`
- **Laravel UI**: `^4.2` → `^4.5`
- **PHP Requirement**: `^8.1` → `^8.2`

### Third-Party Packages
- **Intervention Image**: `^2.4` → `^3.0` (v3.11.5 installed)
- **Yajra DataTables**: `^10.4.0` → `^12.0` (v12.6.3 installed)
- **PHPUnit**: `^10.1` → `^11.0`

## Breaking Changes That Need Attention

### 1. Intervention Image v3 Breaking Changes

⚠️ **IMPORTANT**: Intervention Image v3 has significant API changes that will require code updates.

#### API Changes:
- `Image::make($file)` → `Image::read($file)`
- `Image::canvas($width, $height)` → `Image::create($width, $height)`
- Constraint callbacks work differently

#### Files That Need Updates:
The following files use the old Intervention Image API and will need to be updated:

1. **app/Http/Controllers/PostController.php**
   - Lines 115-137 (featured_image method)
   - Lines 145-167 (featured_image_thumbnail method)

2. **app/Http/Controllers/PageController.php**
   - Lines 95-97

3. **app/Http/Controllers/SettingController.php**
   - Lines 33-35
   - Lines 70-72

4. **app/Http/Controllers/ProfileController.php**
   - Lines 84-86

5. **app/Http/Controllers/WebController.php**
   - Lines 255-257
   - Lines 421-423
   - Lines 451-453

6. **app/Http/Controllers/GalleryController.php**
   - Lines 85-87

#### Migration Example:

**Before (v2):**
```php
$background = Image::canvas(688, 387);
$img = Image::make($image);
$img->resize($x, $y, function ($constraint) {
    $constraint->aspectRatio();
    $constraint->upsize();
});
$background->insert($img, 'center');
$background->save($location);
```

**After (v3):**
```php
$img = Image::read($image);
$img->cover($x, $y);  // or use ->scale() or ->resize() depending on needs
$img->save($location);
```

### 2. Laravel 11/12 Framework Changes

Laravel 12 builds on Laravel 11 which introduced several changes:

#### Service Provider Simplification
- Many service providers are now auto-registered
- The `config/app.php` providers array is less critical

#### Bootstrap Directory Changes
- Laravel 11+ uses a new application structure
- Check if `bootstrap/providers.php` is needed

#### Middleware Changes
- Middleware registration has changed
- Check `app/Http/Kernel.php` vs new `bootstrap/app.php` pattern

#### Model Casts Changes
- `$casts` property now uses `AsEnumCollection::class` for enums
- Date casting uses Carbon 3

### 3. Carbon 3 Changes
- Carbon has been upgraded to v3
- Most code should work the same, but check custom Carbon usages

### 4. PHPUnit 11 Changes
- Test method signatures may need updates
- `setUp()` and `tearDown()` methods must have proper return types

## Required PHP Version

**You must ensure your server is running PHP 8.2 or higher.**

To check your PHP version:
```bash
php -v
```

## Next Steps

1. **Update Intervention Image Usage**
   - Update all Image::make() calls to Image::read()
   - Update all Image::canvas() calls to Image::create()
   - Review resize logic and update constraint callbacks

2. **Test Image Upload Features**
   - Test all image upload functionality
   - Verify image processing works correctly

3. **Run Tests**
   ```bash
   php artisan test
   ```

4. **Update Application Structure (Optional but Recommended)**
   - Consider migrating to Laravel 11+ style bootstrap structure
   - Review the [Laravel 11 upgrade guide](https://laravel.com/docs/11.x/upgrade)

5. **Review Middleware**
   - Check if middleware registration needs updates

6. **Check Deprecations**
   ```bash
   php artisan optimize
   ```

## Configuration Changes Made

1. **config/app.php**
   - Removed `Intervention\Image\ImageServiceProvider::class` (now uses auto-discovery)
   - Updated Image facade to `Intervention\Image\Laravel\Facades\Image::class`

2. **config/image.php**
   - Added `options` array for Intervention Image v3 configuration

3. **composer.json**
   - Updated all package versions as listed above

## Rollback Instructions

If you need to rollback to Laravel 10:

1. Restore the original `composer.json` from git
2. Run `composer install`
3. Restore the original `config/app.php` and `config/image.php`

## Resources

- [Laravel 12 Documentation](https://laravel.com/docs/12.x)
- [Laravel 11 Upgrade Guide](https://laravel.com/docs/11.x/upgrade)
- [Intervention Image v3 Documentation](https://image.intervention.io/v3)
- [Carbon 3 Documentation](https://carbon.nesbot.com/docs/)
