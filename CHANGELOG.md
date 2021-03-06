# Changelog
All notable changes to TypiCMS will be documented in this file.

## 2.3.0 - 2015-05-26

### Changed
- Authentication is now based on Laravel Auth.
- Composer set to "minimum-stability": "stable"
- Better wysiwyg filepicker

### Removed
- Cartalyst/Sentry (No more throttling feature)
- angular-gettext
- cviebrock/image-validator

## 2.2.0 - 2015-05-10

### Added
- Laracasts\Presenter package

### Changed
- Core module Namespace is now TypiCMS\Modules\Core.

## 2.1.6 - 2015-04-28

### Added
- A page can be private.
- Content of a page linked to a module is shown in module’s list template.
- Contacts module has an event that send mail to visitor and webmaster.
- laracasts/generators package added by default.
- CKEditor autocorrect plugin.
- Assets versionning with elixir.
- Possibility to upload the website logo via settings module in admin interface.
- During page creation, possibility to add it to a menu.
- (BETA) Enabling config/typicms.html_cache cause frontend pages being saved as static html in public/html folder.

### Changed
- Locale is no more stored in page’s uri.

### Fixed
- Lot of code cleaning and bug fixes.
