# form-agendamento-horario

<p>
<b>Nome do projeto: </b> Formulário de agendamento de horários.
<b>Integrantes do grupo: </b> Jarod e Jardel.
<b>Descrição do projeto: </b>
Este é um formulário de agendamento de horários de uma lavadora de automóveis. O usuário deve preencher todos os 
campos marcados com * e selecionar um horário entre 7h e 18h de segunda à sexta. Além disso, o intervalo entre 
agendamentos deve ser de 30 em 30 minutos.
<b>Tecnologias utilizadas:</b>
HTML;
CSS;
JavaScript;
Bootstrap 5;
jQuery 3.1.5;
jQuery Mask Plugin;
PHP;
Apache 2;
</p>

<h1>Contextualização:</h1>
<p>Você e seu sócio foram contratados para desenvolver uma aplicação Web para gerenciar o agendamento de horários 
em uma lavação de automóveis. O proprietário do veículo acessará um formulário na aplicação, onde ele informará o 
seu nome completo, telefone para contato (opcional) e se este possui WhatsApp; a marca, modelo, ano (opcional) e 
placa do veículo; e o dia, mês, ano e o horário do agendamento. A lavação funciona de segunda à sexta-feira, das 
8:00 às 18:00, com intervalos de agendamento de 30 em 30 minutos. A aplicação deverá validar o preenchimento dos 
campos obrigatórios do formulário e o agendamento apenas para os dias e horários em que a lavação presta o serviço
.</p>

<h2>-----Como utilizar------</h2>

Instalar VirtualBox

Instalar ubuntu server

Com o VirtualBox aberto ir até <b>Configurações</b> do servidor que você instalou

Vá até <b>Rede</b> e clique em <b>Avançado</b> e em seguida clique em <b>Redirecionamento de Portas</b>

Acrescente uma nova regra de redirecionamento de porta com as seguintes informações:

nome: http
protocolo: TCP
endereco do hospedeiro: 127.0.0.1
porta do hospedeiro: 9980
ip do convidado: 10.0.2.15
porta do convidado: 80

Acrescente mais uma regra de redirecionamento de portas:

nome: ssh
protocolo: TCP
endereco do hospedeiro: 127.0.0.1
porta do hospedeiro: 9922
ip do convidado: 10.0.2.15
porta do convidado: 22

Após as configurações de rede va até <b>Pastas compartilhadas</b>
Antes de acrescentar uma pasta compartilhada crie ela na sua máquina
Clique em <b>Acrescentar nova pasta compartilhada</b>
Coloque o caminho da pasta idêntico ao de sua maquina e adicione o nome da mesma (OBS: lembre do nome)

Inicie seu server

Na maquina host abra seu terminal e execute o comando
$ ssh -p 9922 ubuntu@localhost
senha: ubuntu

Instale o apache2
$ sudo apt update
$ sudo apt install apache2

Instalar o php
$ sudo apt install php

Reiniciar servidor apache
$ sudo service apache2 stop
$ sudo service apache2 start

Vá até o navegador e entre em
localhost:9980

Se estiver na página inicial do apache tudo ocorreu bem

Volte para seu terminal e crie um diretório na VM
$ mkdir -p $HOME/dir_do_host

Montar o diretório compartilhado (Esse comando tem que ser realizado toda vez que a maquina virtual for ligada)
$ sudo mount -t vboxsf -o uid=$UID,gid=$(id -g) nome_da_pasta $HOME/dir_do_host

dir_do_host é o nome que você adicionou pra sua pasta

Criar um link para o diretório compartilhado na VM no diretório raiz do Apache
$ sudo ln -s $HOME/dir_do_host /var/www/html/public

Jogue o projeto dentro da Pasta compartilhada

Acesse com
localhost:9980/public/form-agendamento-horarios
