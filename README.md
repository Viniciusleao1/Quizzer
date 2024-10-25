# Quizzer
Repositório do projeto Quizzer, uma aplicação web interativa desenvolvida em PHP, CSS e JavaScript para criação e realização de quizzes online personalizados. Ideal para professores e estudantes, o Quizzer oferece um ambiente dinâmico e gamificado para aprendizado e avaliação. DEMO: http://viniciusquizphp.rf.gd/


# Quizzer
Um sistema de quiz online construído em PHP, JS e HTML. Ele tem suporte a Timer embutido junto com Painel de Administração

# Recursos adicionados:

1. Adicionado suporte ao Timer.
2. Adicionado controle para "Habilitar" e "Desabilitar" o quiz no painel Admin
3. Adicionado controle para navegar entre todas as perguntas do quiz (durante o quiz) e terminar o quiz quando o usuário quiser.
4. Adicionado controle para que o usuário possa iniciar o teste a qualquer momento e continuar o teste mesmo se ocorrer algum erro ou tempo limite de sessão.
5. Adicionado controle para armazenar as respostas às perguntas e mostrar uma análise detalhada dos resultados do teste.
6. Melhoria da interface gráfica do usuário do painel do teste.

# Configurar:

1. Crie um novo banco de dados no MySQL.
2. Execute a consulta SQL em "quizdb.sql".
3. Abra o arquivo "dbConnection.php" e altere o nome do servidor, nome de usuário, senha e nome do banco de dados.
3. Visite a página inicial no navegador. Use o link "Admin Login" para fazer login no painel de administração. Usuário padrão - 'sunnygkp10@gmail.com' senha - '123456'
3. $Composer install - para instalar as dependências

# Como usar

1. Use o Painel de Administração para configurar o quiz. O quiz não será habilitado a menos que você clique no botão "Habilitar". Clique no mesmo para habilitar um quiz adicionado.
2. As pontuações são atualizadas em tempo real no servidor, no entanto, a tabela de classificação será atualizada somente quando o usuário terminar o quiz, ou houver um tempo limite ou o administrador encerrar o quiz clicando no botão "Desabilitar".
3. Assim que o administrador clicar no botão desabilitar, o quiz termina para todos os usuários que o fizeram, independentemente de seu estado ativo ou inativo (sejam logados ou tenham saído do quiz apenas no meio). A tabela de classificação será atualizada quando um usuário "Termina" seu quiz e quando o administrador "desabilita" o quiz.
4. Assim que o quiz for desabilitado, ele se tornará inacessível. Se o quiz for habilitado novamente mais tarde, somente os usuários que ainda não o fizeram poderão fazê-lo.
5. É recomendável que você ative o teste quando todos os usuários estiverem prontos e desative-o quando todos os usuários tiverem concluído o teste ou o tempo limite para respondê-lo tiver excedido.

# Ressalvas:

1. Muitas consultas SQL, precisa de otimização. Ainda não é adequado para mais de 200 usuários simultâneos.
2. Problemas de segurança, precisa higienizar as consultas de URL.
