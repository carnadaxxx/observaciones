<?php

/*
*Esta es la clase que se encarga de cargar el modelo
*/

class LoadModel{

    function __construct($model) {

        require("./models/$model.php");

    }

}
