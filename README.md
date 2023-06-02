# Shortcodes

Shortcodes for WordPress. Further details and documentations for each shortcode can be found at [Confluence](https://gbk.atlassian.net/wiki/spaces/DEV/pages/326991873/Shortcodes).

-   [Directory structure](#directory-structure)
-   [functions.php](#functionsphp)
-   [Styling (CSS)](#styling-css)

## Directory structure

```
{THEME_DIR}/shortcodes/{SHORT_CODE_FILE_NAME}.php
```

## functions.php

```php
// This should be near the top of the file.
require __DIR__ . '/shortcodes/{SHORT_CODE_FILE_NAME}.php';
```

## Styling (CSS)

Some shortcodes requiring additional styling. They can be found in the CSS file. Either add the CSS file and import it or add the CSS content within the style.css.
