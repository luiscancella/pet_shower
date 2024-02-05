# Pet Shower

## Premissas

Foi adotado como objetivo o desenvolvimento de um site para calcular a escolha mais eficiente entre três petshops em um bairro para dar banho em um cachorro. O design do site é simples e eficiente, com poucos campos para preenchimento, visando simplicidade e objetividade. O aplicativo web não é responsivo e não foi projetado para uso em dispositivos móveis, considerando que não há expectativas de um grande número de usuários.

No desenvolvimento, optou-se por uma abordagem de código simples e iterativo na implementação dos petshops, permitindo fácil integração de mais petshops, se necessário. Por não prever um grande volume de usúario, não foram utilizadas arquiteturas de escalabilidade.

Essas decisões foram tomadas para atender às necessidades específicas do projeto, proporcionando uma experiência direta ao usuário e facilitando a manutenção e evolução do aplicativo conforme necessário.

## Instalação e execução

### Pré-requisitos

Certifique-se de ter os seguintes componentes instalados em sua máquina:

- [Node.js / npm](https://nodejs.org/)

- [PHP](https://www.php.net/)

Foram testado apenas nessas versões, podendo não funcionar em outras:

- Node : 20.11.0
- npm: 10.2.4
- PHP : 8.3.0

### Instalação

Navegue até o diretório do frontend e instale as depências do projeto:

```bash
cd frontend
npm install
```

### Execução

### Frontend (React)

No diretório **frontend**, para executar o aplicativo React no modo desenvolvimento digite o comando:

```bash
npm start
```

Ele irá abrir na porta 3000 e poderá ser acessado pelo link [http://localhost:3000](http://localhost:3000)

### Backend (PHP)

No diretório **backend**, execute o servidor PHP em modo desenvolvimento com o comando:

```bash
php -S localhost:8000
```

O backend estará respondendo requisições em [http://localhost:8000](http://localhost:8000).

## Decisões de projeto

No desenvolvimento, algumas decisões foram tomadas para escolher as tecnologias e abordagens adequadas. Aqui estão algumas das decisões mais importantes:

### Ferramentas

#### React

A escolha do React como a base do frontend foi feita com base na familiaridade e na eficiência que essas tecnologias proporcionam, além de proporcionar fácil entedibilidade dos códigos, tornando um projeto com fácil manutenção.

#### PHP

A escolha do PHP deve a rapidez e facilidade no desenvolvimento, já que é uma linguagem simples de escrever e entender, além de, por ser uma linguagem com muitos anos de existência, existem diversas documentações e suporte disponiveis.

Além disso é uma ferramenta muito estável e possui compatibilidade com outras tecnologias web, como HTML, CSS e JavaScript, facilitando a criação de aplicações web.