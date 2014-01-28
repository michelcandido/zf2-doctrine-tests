<?php
//queries used by tests
return array(
    array(
            'create' => 'CREATE TABLE `categoria` (
                            `id` integer NOT NULL PRIMARY KEY AUTOINCREMENT,
                            `descricao` varchar(255)  NOT NULL,
                            `ativo` tinyint(1) NOT NULL
                          )',
            'drop'   => 'DROP TABLE `categoria`' 
    )
);