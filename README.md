# coffee-time

Este é um sistema simples criado em php, para você cadastrar o nome e e-mail das pessoas da sua equipe de trabalho, o sistema selecionará automaticamente uma das pessoas para fazer o café e enviará um e-mail para avisá-la.

Instalação e configuração:

1 - Baixar o projeto coffee_time

2 - Descompactar e entrar na pasta coffee_time

3 - Abrir o arquivo mail_coffee.php com um editor de textos qualquer, inserir sua equipe no array $team (linha 10), sem limite de quantidade de pessoas.

4 - Logo abaixo, no mesmo arquivo, substituir o conteúdo das variáveis com seus dados para funcionar o envio do e-mail.

5 - O template do e-mail que será enviado está em coffee_time/mail_template.html

6 - Na pasta coffee_time/images você pode inserir suas imagens e referenciar no template.

7 - Edite o template e substitua o link da logomarca e o link da imagem do café, a customização fica a seu critério.
Liks para alterar: 
- http://www.seusite.com.br/images/logo.png
- http://www.meusite.com.br/images/coffee.png

8 - Inserir na crontab do sistema a chamada para a execução do arquivo mail_coffee.php
#Mail coffee será executado todos os dias as 09:00hs e as 15:00hs
00 09,15 * * * root php /caminho_ate_a_pasta/coffee_time/mail_coffee.php >/dev/null 2>&1

*Para testar manualmente o envio:
php /caminho_ate_a_pasta/coffee_time/mail_coffee.php

alesandroalan@gmail.com
