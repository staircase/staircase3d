<header class="post-header">
    <h1 class="entry-title"><?php echo _('Przykro nam :(') ?></h1>
    <span class="hero-title"><?php echo _('To \'coś\' czego szukasz nie znajduje się tutaj!') ?></span>
    <p class="desc-title"><?php echo _('Strona, której szukasz, nie istnieje lub została przeniesiona.') ?></p>
</header>
<article class="entry-content">
    <p><?php echo _('Upewnij się, że wpisałeś prawidłowy adres URL. Jeżeli to nie pomoże spróbuj użyć wyszukiwarki poniżej.') ?></p>
    <?php @include 'searchform.php'; ?>
</article>