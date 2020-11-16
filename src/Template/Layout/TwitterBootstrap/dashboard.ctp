<?php
/* @var $this \Cake\View\View */
use Cake\Core\Configure;

$this->Html->css('BootstrapUI.dashboard', ['block' => true]);
$this->prepend('tb_body_attrs', ' class="' . implode(' ', [$this->request->getParam('controller'), $this->request->getParam('action')]) . '" ');
$this->start('tb_body_start');
?>
<body <?= $this->fetch('tb_body_attrs') ?>>
    <nav class="navbar navbar-dark bg-dark navbar-expand-md">
        <?= $this->Html->link(Configure::read('App.title'), '/', ['class' => 'navbar-brand col-sm-3 col-md-2 mr-0']) ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav px-3">
                <li class='nav-item text-nowrap'><?= $this->Html->link(__('Listes liées'), ['controller' => 'Genres', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
                <li class='nav-item text-nowrap'><?= $this->Html->link(__('Autocomplétion'), ['controller' => 'Cds', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
                <li class='nav-item text-nowrap'><?= $this->Html->link(__('Monopage'), ['controller' => 'GenreFamilies', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                <li class='nav-item text-nowrap'><?= $this->Html->link(__('Admin'), ['controller' => 'Admin/GenreFamilies', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                <li class='nav-item text-nowrap'>
                    <?php
                    $userlog = $this->request->getSession()->read('Auth.User');
                    if($userlog) {
                        $confirmed = $userlog['confirmed'];
                        if($confirmed == 1) {
                            echo $this->Html->link(__('Confirmed'), ['controller' => 'Cds', 'action' => 'index'], ['class' => 'nav-link']);
                        } else {
                            $email = $userlog['email'];
                            $uuid = $userlog['uuid'];
                            echo $this->Html->link(__('Confirm email address'), ['controller' => 'Users', 'action' => 'userSendsConfirmationEmail', $email, $uuid], ['class' => 'nav-link']);
                        }
                    }
                    ?>
                </li>
                <li class='nav-item text-nowrap'>
                    <?php
                    $loguser = $this->request->getSession()->read('Auth.User');
                    if($loguser){
                        $user = $loguser['email'];
                        echo "<span>" . $this->Html->link($user, ['controller' => 'Users', 'action' => 'view', $loguser['id']]);
                        echo $this->Html->link(__(' Logout'), ['controller' => 'Users', 'action' => 'logout']) . "</span>";
                    } else {
                        echo $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login'], ['class' => 'nav-link']);
                    }
                    ?>
                </li>
                <li class='nav-item text-nowrap'><?= $this->Html->link('Français', ['action' => 'changeLang', 'fr_CA'], ['escape' => false, 'class' => 'nav-link']) ?></li>
                <li class='nav-item text-nowrap'><?= $this->Html->link('English', ['action' => 'changeLang', 'en_US'], ['escape' => false, 'class' => 'nav-link']) ?></li>
                <li class='nav-item text-nowrap'><?= $this->Html->link('Español', ['action' => 'changeLang', 'es_ES'], ['escape' => false, 'class' => 'nav-link']) ?></li>
                <li class='nav-item text-nowrap'><?= $this->Html->link(__('À propos'), ['controller' => 'Pages', 'action' => 'aPropos'], ['class' => 'nav-link']) ?></li>
            </ul>
        </div>
    </nav>
    
    

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light">
                <div class="sidebar-sticky">
                   
                    <?= $this->fetch('tb_sidebar') ?>

                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <h1 class="page-header"><?= $this->request->controller; ?></h1>
<?php
/**
 * Default `flash` block.
 */
if (!$this->fetch('tb_flash')) {
    $this->start('tb_flash');
    if (isset($this->Flash))
        echo $this->Flash->render();
    $this->end();
}
$this->end();

$this->start('tb_body_end');
echo '</body>';
$this->end();

$this->append('content', '</main></div></div>');
echo $this->fetch('content');
