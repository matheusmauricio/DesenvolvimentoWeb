<?php

class ControleHome {
    
    public function index() {
        $carregarView = new ConfigView("home/home");
        $carregarView->renderizar();
    }
}
