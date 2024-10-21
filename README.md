
# 🎯 Banco de Dados - Especificação Técnica

## Modelo Geral:
O banco de dados será do tipo relacional, podendo ser implementado com qualquer SGBD, como **MySQL**, **PostgreSQL** ou **SQL Server**. A seguir estão as principais tabelas e suas relações.

## Tabelas:

### 1. **Usuários** (`usuarios`)
Esta tabela contém as informações básicas sobre os usuários registrados.

| Coluna         | Tipo         | Restrições                          | Descrição                                     |
|----------------|--------------|-------------------------------------|-----------------------------------------------|
| `id`           | INT          | PRIMARY KEY, AUTO_INCREMENT         | Identificador único do usuário                |
| `nome`         | VARCHAR(100) | NOT NULL                            | Nome do usuário                               |
| `email`        | VARCHAR(255) | NOT NULL, UNIQUE                    | E-mail do usuário                             |
| `senha`        | VARCHAR(255) | NOT NULL                            | Senha criptografada do usuário                |
| `data_criacao` | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP           | Data de criação da conta                      |
| `pontuacao`    | INT          | DEFAULT 0                           | Pontuação total do usuário acumulada no jogo  |
| `avatar`       | VARCHAR(255) | DEFAULT 'default.png'               | Caminho para o avatar do usuário              |

### 2. **Perguntas** (`perguntas`)
Esta tabela armazena as perguntas que compõem o quiz, divididas por categorias.

| Coluna        | Tipo         | Restrições                          | Descrição                                     |
|---------------|--------------|-------------------------------------|-----------------------------------------------|
| `id`          | INT          | PRIMARY KEY, AUTO_INCREMENT         | Identificador único da pergunta               |
| `texto`       | TEXT         | NOT NULL                            | Texto da pergunta                             |
| `id_categoria`| INT          | FOREIGN KEY (categorias.id)          | Referência à categoria da pergunta            |
| `nivel_dificuldade` | ENUM('fácil', 'médio', 'difícil') | NOT NULL | Nível de dificuldade da pergunta              |
| `data_criacao`| TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP           | Data de criação da pergunta                   |

### 3. **Categorias** (`categorias`)
Esta tabela contém as categorias para as perguntas, como Esportes, História, Geografia, etc.

| Coluna  | Tipo         | Restrições                 | Descrição                         |
|---------|--------------|----------------------------|-----------------------------------|
| `id`    | INT          | PRIMARY KEY, AUTO_INCREMENT| Identificador único da categoria  |
| `nome`  | VARCHAR(100) | NOT NULL, UNIQUE           | Nome da categoria                 |

### 4. **Respostas** (`respostas`)
Esta tabela armazena as respostas das perguntas.

| Coluna         | Tipo         | Restrições                          | Descrição                                     |
|----------------|--------------|-------------------------------------|-----------------------------------------------|
| `id`           | INT          | PRIMARY KEY, AUTO_INCREMENT         | Identificador único da resposta               |
| `id_pergunta`  | INT          | FOREIGN KEY (perguntas.id)           | Referência à pergunta                         |
| `texto`        | TEXT         | NOT NULL                            | Texto da resposta                             |
| `correta`      | BOOLEAN      | NOT NULL                            | Indica se a resposta é correta (true/false)   |

### 5. **Jogos** (`jogos`)
Tabela que registra as sessões de jogo entre os jogadores.

| Coluna         | Tipo         | Restrições                          | Descrição                                     |
|----------------|--------------|-------------------------------------|-----------------------------------------------|
| `id`           | INT          | PRIMARY KEY, AUTO_INCREMENT         | Identificador único do jogo                   |
| `id_usuario_1` | INT          | FOREIGN KEY (usuarios.id)            | Referência ao primeiro jogador                |
| `id_usuario_2` | INT          | FOREIGN KEY (usuarios.id)            | Referência ao segundo jogador                 |
| `vencedor`     | INT          | FOREIGN KEY (usuarios.id) NULLABLE   | Referência ao vencedor da partida             |
| `data_jogo`    | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP           | Data da partida                               |

### 6. **Jogadas** (`jogadas`)
Tabela que registra os turnos das partidas, armazenando as perguntas respondidas e o resultado.

| Coluna         | Tipo         | Restrições                          | Descrição                                     |
|----------------|--------------|-------------------------------------|-----------------------------------------------|
| `id`           | INT          | PRIMARY KEY, AUTO_INCREMENT         | Identificador único da jogada                 |
| `id_jogo`      | INT          | FOREIGN KEY (jogos.id)               | Referência ao jogo                            |
| `id_usuario`   | INT          | FOREIGN KEY (usuarios.id)            | Referência ao jogador                         |
| `id_pergunta`  | INT          | FOREIGN KEY (perguntas.id)           | Referência à pergunta respondida              |
| `id_resposta`  | INT          | FOREIGN KEY (respostas.id)           | Referência à resposta dada                    |
| `correta`      | BOOLEAN      | NOT NULL                            | Indica se a resposta foi correta              |

### 7. **Rankings** (`rankings`)
Tabela que armazena a classificação dos jogadores com base na pontuação total acumulada.

| Coluna         | Tipo         | Restrições                          | Descrição                                     |
|----------------|--------------|-------------------------------------|-----------------------------------------------|
| `id`           | INT          | PRIMARY KEY, AUTO_INCREMENT         | Identificador único do ranking                |
| `id_usuario`   | INT          | FOREIGN KEY (usuarios.id)            | Referência ao jogador                         |
| `posicao`      | INT          | NOT NULL                            | Posição no ranking                            |
| `pontuacao`    | INT          | NOT NULL                            | Pontuação total do jogador                    |

---

# 🎨 Design da Arquitetura da Aplicação

## Componentes Principais:
1. **Frontend**: Interface gráfica para interação do usuário.
   - **Tecnologias sugeridas**: React, Vue.js ou Angular.
   - **Funcionalidades**:
     - Interface amigável para responder perguntas.
     - Visualização de rankings e pontuações.
     - Tela de login, registro e perfil do usuário.
     - Sistema de notificações de desafios/jogos.

2. **Backend**: Processamento das regras de negócio e manipulação do banco de dados.
   - **Tecnologias sugeridas**: Node.js com Express, Django ou Laravel.
   - **Funcionalidades**:
     - Validação das respostas dos usuários.
     - Gerenciamento de partidas e pontuações.
     - Manipulação de dados (CRUD) para perguntas e categorias.
     - Sistema de autenticação de usuários (JWT, OAuth).

3. **Banco de Dados**: Armazenamento e gerenciamento de dados dos usuários, perguntas e jogos.
   - **SGBD sugeridos**: MySQL, PostgreSQL, ou qualquer banco de dados relacional com suporte a transações.

4. **API**: Comunicação entre frontend e backend.
   - **Padrão**: RESTful API.
   - **Endpoints principais**:
     - `/usuarios`: para criação e autenticação de usuários.
     - `/perguntas`: para listar, adicionar, editar e deletar perguntas.
     - `/jogos`: para iniciar e gerenciar partidas.
     - `/rankings`: para recuperar as posições dos jogadores.

5. **Servidor de Autenticação**: Responsável por validar usuários e sessões de jogo.
   - **JWT (JSON Web Tokens)**: Para autenticação de usuários e sessões.

## Diagrama de Interação:

```markdown
+----------------+             +----------------+             +-------------------+
|                |             |                |             |                   |
|   **Frontend** |  <------->  |  **API**       |  <------->  | **Banco de Dados** |
|                |             |                |             |                   |
+----------------+             +----------------+             +-------------------+
                                   ^
                                   |
                           +---------------+
                           |               |
                           |  Autenticação |
                           |               |
                           +---------------+
```

## Fluxo Geral:

1. O usuário acessa a interface no frontend e faz login.
2. A API valida a autenticação via JWT e acessa o banco de dados para buscar as informações do usuário.
3. O usuário pode iniciar um novo jogo ou continuar um jogo existente.
4. Perguntas são obtidas da tabela `perguntas` e enviadas ao frontend.
5. As respostas são validadas e armazenadas na tabela `jogadas`.
6. Ao final do jogo, o vencedor é definido e sua pontuação é atualizada.
7. O ranking é atualizado com base nas pontuações acumuladas.
