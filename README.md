## Solução técnica 

 
 

Utilizando uma arquitetura cliente servidor, desenvolvi para o backend uma api php com o laravel 5.6. E para o frontend uma aplicação web com o angular 5. 

 
 

##backend 

-[laravel - banco] 

O banco de dados relacional com as tabelas users,password,dados,contatos e endereços, foi modelado e escrito em migrações junto com a seeds [Users]. apos configurar os dados de acesso no arquivo .env basta digitar o comando [php artisan:migrate --seed], para gerar o banco de dados e criar o usuário :"[jc@teste.com.br]"com a senha [testejc].  

 
 

-[laravel - Rotas] 

Para consumir os dados da Api as seguintes rotas foram geradas: 

 
 

- Route::get('/contatos','ContatosController@index'); 

- Route::post('/contatos/cadastro','ContatosController@store'); 

- Route::post('/contatos/update/{id}','ContatosController@update'); 

- Route::get('/contatos/destroy/{id}','ContatosController@destroy'); 

- Route::get('/contatos/show/{id}','ContatosController@show'); 

 
 
-[laravel - token] 
A api esta utilizando autenticação [jwt], para consumir é necessário utilizar um token . 

 
 

-[laravel - Validação] 

 
 

Temos um arquivo Request que intercepta os dados para validar antes mesmo de iniciar a função para o qual foi enviado, nesta mesma validação é verificado se o telefone já  existe no banco e dados, evitando que dados sejam armazenados em duplicidade. 

  

-[laravel - persitencia] 

Os Dados são entregues no controller que repassa para o [service] "classe criado para separar a regra de negocio deixando o código mas limpo". Essa Classe retorna uma resposta para o controller, que retorna para o usuário. 

[Atomicidade] - Como estamos trabalhando com dados relacionais, para garantir a segurança os dados só serão armazenados nas três tabelas(dados,contatos,endereco). caso algo der errado um rollback será feito e uma mensagem erro enviada ao cliente. 

 
 

-[laravel - Serialização] 

Usando o Resource, um novo recurso do laravel, os dados são serializados e devolvido para o cliente. 

 
 

##frontend 

O front foi desenvolvido em uma versão web com o angular, com isso conseguimos reaproveitar todo o código para o desenvolvimento mobile (android,ios,windows).  

 
 
 ##rodar Aplicação

 [Api]
 -configurar .env
 -rodar composer install
 -php artisan migrate --seed
 -php artisan serve
 
 [App]
 -npm install
 -ng serve -o
 


 
 
