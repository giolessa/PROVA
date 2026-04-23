#PROVA DO SISTEMA DE PERGUNTAS E USUÁRIOS INFORMAÇÕES

Esse projeto foi desenvolvido como parte da avaliação da disciplina DAW.

Aqui no README vou explicar sobre as mudanças feitas no arquivo original.
Para ver o arquivo original, por ter feito por upload de arquivos direto no github, é só entrar no histórico de commits do repositório que todos os códigos estarão juntos

No link abaixo deixo uma comparação entre as duas versões

[Mudança entre a primeira e ultima versao](https://github.com/giolessa/PROVA/compare/dfc4284...main)

Fiz dois commits, onde no primeiro eu, por acidente, passei parte do código da criação de perguntas Multipla Escolha para criarUsuario.php, alterei o nome de alguns arquivos e mudei todos os arquivos para uma nova estrutura de pastas
Já no segundo, eu consertei o erro e finalizei a prova.

No diagrama abaixo eu mostro a estrutura de pastas que eu fiz

```text
  PROVA/
  ├── index.php                 # pagina principal
  ├── css/                      # css para estilização das páginas
  │   ├── style_alterar.css
  │   ├── style_alterarUsu.css
  │   ├── style_criarUsu.css
  │   ├── style_escolha.css
  │   ├── style_excluir.css
  │   ├── style_excluirUsu.css
  │   ├── style_index.css
  │   ├── style_listaUsuarios.css
  │   └── style_perguntas.css
  ├── data/                     # para armazenar os dados
  │   ├── multipla.txt
  │   ├── perguntas.txt
  │   └── usuarios.txt
  ├── perguntas/                # pasta com os arquivos de gerenciamento das perguntas
  │   ├── alterarMult.php
  │   ├── alterarPergunta.php
  │   ├── alterarPerguntas.php
  │   ├── criarPerguntas.php
  │   ├── criarPerguntasMult.php
  │   ├── excluirMult.php
  │   ├── excluirPergunta.php
  │   ├── listPerguntas.php
  │   ├── listPerguntasMult.php
  │   └── telaPerguntas.php
  └── usuarios/                 # pasta com os arquivos de gerenciamento dos usuarios
      ├── alterarUsuario.php
      ├── criarUsuario.php
      ├── excluirUsuario.php
      └── listUsuario.php

Tanto os usuários quanto as perguntas tem seu crud(criar, ler, atualizar e deletar).
Além disso, adicionei outras telas para organização como "telaPerguntas.php" e "alterarPerguntas.php" que são páginas onde o usuário decide a que ele quer alterar ou criar.

Nessa alteração terminei de escrever os códigos das que faltavam, terminei de estilizar e alterei algumas coisas poucas coisas para melhoria. Porém, os arquivos de CRUD seguem a mesma base dada em aula, com poucas mudanças. 
