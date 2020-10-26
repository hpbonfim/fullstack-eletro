# Banco de Dados

<div >
<p> Para realizar os exercícios de banco de dados</p>
<h2>1. Instalar o Docker</h2>
<a href="https://blog.qaninja.io/instalando-o-docker/">Como instalar no Ubuntu / Mac / Windows</a>
<hr>
<h2> 2. Instalar o Docker Compose</h2>
<a href="https://www.digitalocean.com/community/tutorials/how-to-install-docker-compose-on-ubuntu-18-04-pt"> Como instalar no Ubuntu</a>
<p>No Windows / Mac a instalação é junto com o docker!</a>
<hr>
<h2> 3. Execute o script</h2>
<p>Clone este projeto para o seu computador usando <b><code>git clone https://github.com/hpbonfim/database-recodepro.git</code></b> ou fazendo o <a href="https://github.com/hpbonfim/database-recodepro/archive/master.zip">download via ZIP</a></p>
<p>Depois de terminar, dentro da pasta <b>database-recodepro</b> existe um arquivo chamado <b><i>docker-compose.yml</b></i>
<p>No terminal de comandos do seu PC: </p>
<p>1. execute o comando <b><code>docker-compose up -d</code></b> e aguarde o download e quando aparecer <span style="color: green; ">DONE</span> significa que está rodando!.</p>
<p>OBS: Existe um log, caso queira ver, escreva no terminal o comando <b><code>docker-compose logs </code></b></p>
<p>Para encerrar, escreva no terminal o comando <b><code>docker-compose down </code></b></p>
<br>
<p><b>Para apagar tudo do seu computador, escreva no terminal os comandos:</b></p>
<ol>
    <li><b><code>docker-compose down </code></b></li>
    <li><b><code>docker rmi -f $(docker images -aq) </code></b></li>
    <li><b><code>docker rm - f $(docker ps -aq) </code></b></li>
    <li><b><code>docker volume prune -f </code></b></li>
    <li><b><code>docker system prune -f </code></b></li>
</ol>
<hr>
<h2> 4. Utilização</h2>
<p>Existem 3 serviços ao seu dispor:</p>
<ul>
    <li>MySQL - Banco de Dados Relacional</li>
    <li><a href="#phpmyadmin">phpMyAdmin - Gerenciador do Banco</a></li>
    <li><a href="#workbench">MySQL Workbench - Outro Gerenciador do Banco</a></li>
</ul>
<p>O MySQL é um serviço de segundo plano, ou seja, apenas aplicativos de primeiro plano conseguem utilizar e é ai que entra o phpMyAdmin</p>
<h2 id="phpmyadmin">Para utilizar o phpMyAdmin, abra no seu navegador: <a href="http://localhost:8080">http://localhost:8080/</a></h2>
<br>
<h3>Você vai ver uma tela semelhante a esta abaixo</h3>
<img src="imagens/login_banco.png" width="30%"/>

<h3>1. Para acessar o banco de dados, use as seguintes informações: </h3>
<ul>
    <li>Servidor: mysql</li>
    <li>Usuário: recode</li>
    <li>Senha: recode</li>
</ul>
<hr>
<h3>2. Entre no banco de dados chamado <b><code>recode</code></b></h3>
<a href="imagens/tela_inicial.png"><img src="imagens/tela_inicial.png" width="50%"/></a>
<hr>
<h3>3. Crie suas tabelas</h3>
<a href="imagens/criar_tabelas.png"><img src="imagens/criar_tabelas.png" width="50%"/></a>
<a href="imagens/criacao_tabela.png"><img src="imagens/criacao_tabela.png" width="50%"/></a>
<hr>
<br>
<h2 id="workbench">Para utilizar o MySQL Workbench, abra no seu navegador: <a href="http://localhost:3000">http://localhost:3000/</a></h2>
<br>
<h3>1. Você vai ver uma tela semelhante a esta abaixo</h3>
<a href="imagens/imagens_workbench/1_tela_inicial.png">
<img src="imagens/imagens_workbench/1_tela_inicial.png" width="50%"/>
</a>
<br>
<span>Selecione a caixinha e clique em OK</span>
<hr>
<br>

<h3>2. Para acessar o banco de dados, use as seguintes informações: </h3>
<ul>
    <li>Connection Name: Recode</li>
    <li>Hostname: mysql</li>
    <li>Username: root</li>
</ul>
<p>Clique em OK</p>
<a href="imagens/imagens_workbench/2_preencher_dados.png">
<img src="imagens/imagens_workbench/2_preencher_dados.png" width="50%"/>
</a>
<br>
<hr>
<br>
<h3>3. Entre no banco de dados criado: <b><code>Recode</code></b> e digite a senha</h3>
<ul>
    <li>Em todas os inputs, digite: <b>recode</b></li>
</ul>
<a href="imagens/imagens_workbench/3_inserir_senha.png"><img src="imagens/imagens_workbench/3_inserir_senha.png" width="50%"/></a>
<a href="imagens/imagens_workbench/4_guardar_senha.png"><img src="imagens/imagens_workbench/4_guardar_senha.png" width="50%"/></a>
<hr>


<h3>4. Pronto para realizar as tarefas</h3>
<a href="imagens/imagens_workbench/5_pronto.png"><img src="imagens/imagens_workbench/5_pronto.png" width="50%"/></a>
<hr>

</div>
