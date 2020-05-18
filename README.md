<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

# Laravel Udemy

## Relacionamento muitos para muitos


## Sintaxe Laravel

Tabela com chaves extrangeiras

Obs.: Usar o **BigInteger** no índice para ser compatível


```
public function up()
    {
        Schema::create('alocacoes', function (Blueprint $table) {
            $table->BigInteger('desenvolvedor_id')->unsigned();
            $table->foreign('desenvolvedor_id')->references('id')->on('desenvolvedores');
            $table->BigInteger('projeto_id')->unsigned();
            $table->foreign('projeto_id')->references('id')->on('projetos');
            $table->integer('horas_semanais');
            $table->primary(['projeto_id', 'desenvolvedor_id']);
        });
    }
```

## MySQL

Exibindo como a tabela foi criada 


*show crete table alocacoes;*


```
| alocacoes | CREATE TABLE `alocacoes` (
  `desenvolvedor_id` bigint unsigned NOT NULL,
  `projeto_id` bigint unsigned NOT NULL,
  `horas_semanais` int NOT NULL,
  PRIMARY KEY (`projeto_id`,`desenvolvedor_id`),
  KEY `alocacoes_desenvolvedor_id_foreign` (`desenvolvedor_id`),
  CONSTRAINT `alocacoes_desenvolvedor_id_foreign` FOREIGN KEY (`desenvolvedor_id`) REFERENCES `desenvolvedores` (`id`),
  CONSTRAINT `alocacoes_projeto_id_foreign` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci |
```

