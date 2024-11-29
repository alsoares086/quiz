-- Inserir perguntas fáceis
INSERT INTO questions (question) VALUES
('No Twitter, qual era o limite original de caracteres para um Tweet?'),
('Qual é o comprimento de um endereço IPv6?'),
('Qual é o nome do domínio para o país Tuvalu?'),
('A série de gráficos Intel HD que sucede as gerações 5000 e 6000 (Broadwell) é chamada de:'),
('Em computação, o que significa MIDI?'),
('Qual dispositivo de hardware de computador fornece uma interface para todos os outros dispositivos conectados se comunicarem?'),
('Qual é o formato de imagem mais utilizado para logotipos no banco de dados Wikimedia?'),
('Qual linguagem o Node.js usa?'),
('HTML é que tipo de linguagem?'),
('Se você fosse codificar software nesta linguagem, você só conseguiria digitar 0’s e 1’s.');

-- Inserir respostas para as perguntas fáceis
INSERT INTO answers (question_id, answer_text, is_correct) VALUES
(1, '140', 1),
(1, '120', 0),
(1, '160', 0),
(1, '100', 0),

(2, '128 bits', 1),
(2, '32 bits', 0),
(2, '64 bits', 0),
(2, '128 bytes', 0),

(3, '.tv', 1),
(3, '.tu', 0),
(3, '.tt', 0),
(3, '.tl', 0),

(4, 'HD Graphics 500', 1),
(4, 'HD Graphics 700', 0),
(4, 'HD Graphics 600', 0),
(4, 'HD Graphics 7000', 0),

(5, 'Musical Instrument Digital Interface', 1),
(5, 'Musical Interface of Digital Instruments', 0),
(5, 'Modular Interface of Digital Instruments', 0),
(5, 'Musical Instrument Data Interface', 0),

(6, 'Motherboard', 1),
(6, 'Central Processing Unit', 0),
(6, 'Hard Disk Drive', 0),
(6, 'Random Access Memory', 0),

(7, '.svg', 1),
(7, '.png', 0),
(7, '.jpeg', 0),
(7, '.gif', 0),

(8, 'JavaScript', 1),
(8, 'Java', 0),
(8, 'Java Source', 0),
(8, 'Joomla Source Code', 0),

(9, 'Markup Language', 1),
(9, 'Macro Language', 0),
(9, 'Programming Language', 0),
(9, 'Scripting Language', 0),

(10, 'Binary', 1),
(10, 'JavaScript', 0),
(10, 'C++', 0),
(10, 'Python', 0);

-- Inserir perguntas médias
INSERT INTO questions (question) VALUES
('Qual foi a primeira versão do Android especificamente otimizada para tablets?'),
('Enquanto a Apple foi formada na Califórnia, em qual estado do oeste foi fundada a Microsoft?'),
('Qual é o nome do tema padrão que é instalado com o Windows XP?'),
('Em termos de computação, tipicamente o que significa CLI?'),
('Geralmente, qual componente de um computador consome mais energia?'),
('Em qual dispositivo de hardware de computador está localizada a chip BIOS?'),
('Whistler foi o codinome deste sistema operacional Microsoft.'),
('Qual dessas pessoas NÃO foi fundadora da Apple Inc?'),
('Quantos núcleos o Intel i7-6950X tem?'),
('Qual dessas linguagens é usada como linguagem de script no motor de jogos Unity 3D?');

-- Inserir respostas para as perguntas médias
INSERT INTO answers (question_id, answer_text, is_correct) VALUES
(11, 'Honeycomb', 1),
(11, 'Eclair', 0),
(11, 'Froyo', 0),
(11, 'Marshmellow', 0),

(12, 'New Mexico', 1),
(12, 'Washington', 0),
(12, 'Colorado', 0),
(12, 'Arizona', 0),

(13, 'Luna', 1),
(13, 'Neptune', 0),
(13, 'Whistler', 0),
(13, 'Bliss', 0),

(14, 'Command Line Interface', 1),
(14, 'Common Language Input', 0),
(14, 'Control Line Interface', 0),
(14, 'Common Language Interface', 0),

(15, 'Video Card', 1),
(15, 'Hard Drive', 0),
(15, 'Processor', 0),
(15, 'Power Supply', 0),

(16, 'Motherboard', 1),
(16, 'Hard Disk Drive', 0),
(16, 'Central Processing Unit', 0),
(16, 'Graphics Processing Unit', 0),

(17, 'Windows XP', 1),
(17, 'Windows 2000', 0),
(17, 'Windows 7', 0),
(17, 'Windows 95', 0),

(18, 'Jonathan Ive', 1),
(18, 'Steve Jobs', 0),
(18, 'Ronald Wayne', 0),
(18, 'Steve Wozniak', 0),

(19, '10', 1),
(19, '12', 0),
(19, '8', 0),
(19, '4', 0),

(20, 'C#', 1),
(20, 'Java', 0),
(20, 'C++', 0),
(20, 'Objective-C', 0);

-- Inserir perguntas difíceis
INSERT INTO questions (question) VALUES
('Qual dos seguintes é o mais antigo desses computadores pela data de lançamento?'),
('Quem inventou o "Spanning Tree Protocol"?'),
('Qual a principal linguagem de programação usada no Unreal Engine 4?'),
('A America Online (AOL) começou como qual desses provedores de serviço online?'),
('Qual desses nomes foi um codinome de um projeto cancelado da Microsoft?'),
('Em qual porta o HTTP é executado?'),
('Qual dos seguintes componentes de computador pode ser construído usando apenas portas NAND?'),
('Qual tipo de chip de som o Super Nintendo Entertainment System (SNES) possui?'),
('Qual foi o nome da vulnerabilidade de segurança encontrada no Bash em 2014?'),
('Como o Sistema Internacional de Unidades se refere a 1024 bytes?');

-- Inserir respostas para as perguntas difíceis
INSERT INTO answers (question_id, answer_text, is_correct) VALUES
(21, 'TRS-80', 1),
(21, 'Commodore 64', 0),
(21, 'ZX Spectrum', 0),
(21, 'Apple 3', 0),

(22, 'Radia Perlman', 1),
(22, 'Paul Vixie', 0),
(22, 'Vint Cerf', 0),
(22, 'Michael Roberts', 0),

(23, 'C++', 1),
(23, 'Assembly', 0),
(23, 'C#', 0),
(23, 'ECMAScript', 0),

(24, 'Quantum Link', 1),
(24, 'CompuServe', 0),
(24, 'Prodigy', 0),
(24, 'GEnie', 0),

(25, 'Neptune', 1),
(25, 'Enceladus', 0),
(25, 'Pollux', 0),
(25, 'Saturn', 0),

(26, '80', 1),
(26, '53', 0),
(26, '443', 0),
(26, '23', 0),

(27, 'ALU', 1),
(27, 'CPU', 0),
(27, 'RAM', 0),
(27, 'Register', 0),

(28, 'ADPCM Sampler', 1),
(28, 'FM Synthesizer', 0),
(28, 'Programmable Sound Generator (PSG)', 0),
(28, 'PCM Sampler', 0),

(29, 'Shellshock', 1),
(29, 'Heartbleed', 0),
(29, 'Bashbug', 0),
(29, 'Stagefright', 0),

(30, 'Kibibyte', 1),
(30, 'Kylobyte', 0),
(30, 'Kilobyte', 0),
(30, 'Kelobyte', 0);
