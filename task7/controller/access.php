<IfModule mod_rewrite.c>
    # rewrite engine settings:
    RewriteEngine On
    RewriteBase /
    Options -Indexes

    # rewrite rules:
    RewriteRule . index.php [NC,L]
</IfModule>