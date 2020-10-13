<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><?= $this->Html->link(__('Home'), ['controller' => 'cds', 'action' => 'index']) ?></li>
                <li>
                    <?php
                    $userlog = $this->request->getSession()->read('Auth.User');
                    if($userlog) {
                        $confirmed = $userlog['confirmed'];
                        if($confirmed == 1) {
                            echo $this->Html->link(__('Confirmed'), ['controller' => 'Cds', 'action' => 'index']);
                        } else {
                            $email = $userlog['email'];
                            $uuid = $userlog['uuid'];
                            echo $this->Html->link(__('Confirm email address'), ['controller' => 'Users', 'action' => 'userSendsConfirmationEmail', $email, $uuid]);
                        }
                    }
                    ?>
                </li>
                <li>
                    <?php
                    $loguser = $this->request->getSession()->read('Auth.User');
                    if($loguser){
                        $user = $loguser['email'];
                        echo "<span>" . $this->Html->link($user, ['controller' => 'Users', 'action' => 'view', $loguser['id']]);
                        echo $this->Html->link(__(' Logout'), ['controller' => 'Users', 'action' => 'logout']) . "</span>";
                    } else {
                        echo $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']);
                    }
                    ?>
                </li>
                <li><?= $this->Html->link('Français', ['action' => 'changeLang', 'fr_CA'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link('English', ['action' => 'changeLang', 'en_US'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link('Español', ['action' => 'changeLang', 'es_ES'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link(__('À propos'), ['controller' => 'Pages', 'action' => 'aPropos']) ?></li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
