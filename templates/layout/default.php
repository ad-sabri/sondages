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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css">
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- FontAwesome -->
    <?= $this->Html->css('font-awesome.min.css') ?>

    <?= $this->Html->css('style.css') ?>
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link btn btn-success mx-2" href="#">Nouveau sondage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary mx-2" href="#">Mes sondages</a>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(__('Changer de mot de passe'),[
                        'controller'=>'Users',
                        'action'=>'changePassword',
                        $user['id']
                    ],['class'=>'nav-link btn btn-primary mx-2']); ?>
                </li>
                <?php if(!empty($user)): ?>
                <li class="nav-item">
                    <?= $this->Html->link(__('Afficher les médias'),[
                        'controller'=>'Medias',
                        'action'=>'index'
                    ],['class'=>'nav-link btn btn-info mx-2']); ?>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                <?php if(empty($user)): ?>    
                    <?= $this->Form->create(null,[
                        'method' => 'post',
                        'url' => [
                            'controller'=>'users',
                            'action'=>'login'
                        ],
                    ]); ?>
                    <?= $this->Form->control('nickname'); ?>
                    <?= $this->Form->control('password'); ?>
                    <?= $this->Form->button('Se connecter'); ?>
                    <?= $this->Form->end(); ?>
                <?php else: ?>    
                    <?= $this->Html->link('Se déconnecter',[
                        'controller'=>'Users',
                        'action'=>'logout'
                        ],['class'=>'btn btn-danger']
                    ); ?>
                <?php endif; ?>
                </li>
                <span class="profil badge badge-pill badge-primary mx-2">
                    <?= $this->Html->link($user['nickname'], [
                        'controller' => 'Users',
                        'action' => 'view',
                        $user['id']
                    ],['class'=>'highlight']); ?>
                </span>
              </ul>
            </div>
          </nav>
        <nav class="top-nav">
            <div class="top-nav-title">
                <a href="/"><span>Cake</span>PHP</a>
            </div>
            <div class="top-nav-links">
            
            </div>
        </nav>
        <main class="main">
            <div class="container">
                <div class="alert alert-info"><?= 'Afficher le dernier questionnaire du '
        .$this->Html->link(__('matin'), [
            'controller'=>'questionnaires',
            'action'=>'getQuestionnaire',
            'am'
        ])
        .' ou de l\''
        .$this->Html->link(__('après-midi'),[
            'controller'=>'questionnaires',
            'action'=>'getQuestionnaire',
            'pm'
        ]) ?></div>
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
        </main>
        <footer>
            <div class="bg-dark">&copy; EPFC &dotsquare; 2019-2020</div>
        </footer>
    </div>
<!-- Bootstrap -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>
</html>
