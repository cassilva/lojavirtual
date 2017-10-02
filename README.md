# lojavirtual
versao 1 
Loja virtual
Do projeto
O projeto consiste em uma loja virtual fictícia, onde o cliente pode visualizar os itens disponíveis e, caso tenha interesse poderá está efetuando a compra dos mesmos.
	Utilizei de algumas ferramentas para a elaboração desse projeto, dentre elas estão:
•	Servidor PHP XAMMP – para rodar o servidor PHP localmente, e ainda fiz uso do recurso e ferramenta phpAdmin para a manipulação do Banco de Dados.
•	Sublime Text – para a criação e manipulação dos códigos.
•	GitHub – para armazenagem dos códigos, e versões dos mesmos.

Além das ferramentas acima citadas também fiz uso das linguagens HTML, CSS, JavaScript, PHP e SQL, e de seus recursos para que houvesse um bom funcionamento do meu projeto:
FERRAMENTA	UTILIDADE	VERSÃO
HTML	Base e estrutura do site.	5
CSS	Utilizado para dar cor e vida ao site.	3
JavaScript	Utilizado para a implementação do menu versão mobile.	-
PHP	Usado para as logicas necessárias para o funcionamento do site.	5.5 ou superior
SQL	Utilizado para a manipulação do banco de dados.	-

 Do funcionamento
	Clientes
	O site, na visão do cliente, consiste em uma tela inicial “index.php”, onde são expostos os produtos que estão disponíveis para venda, o cliente pode assim então logo ao acessar o site ter acesso aos produtos oferecidos.
	Consiste ainda em outras duas páginas “cadastro.php” e “login.php”, para que o cliente possa efetuar compras, é necessário que o mesmo esteja cadastrado no sistema, e tenha efetuado o login, caso contrário o mesmo só poderá visualizar os produtos. A partir do momento em que o cliente loga no sistema, é disponibilizada uma outra página, ”carrinho.php”, que é a página responsável por armazenar temporariamente os produtos pelo qual o cliente demonstrou interesse.
 
Figura 1 - Visão do cliente
 	Funcionários
	A visão do site no lado do funcionário é bem simples e fácil, o mesmo contém uma página de cadastro ”cadadm.php”, para que o funcionário poderá está fazendo seu cadastro, logo será direcionado para a página “adm.php”, onde o mesmo possa está efetuando login, e assim que estiver logado, ele poderá está cadastrando produtos, alterando os dados do produto caso necessário, e até mesmo poderá fazer a exclusão de produtos, através da página “cadproduto.php. 
 
Figura 2 - Visão funcionário
	Sistema
	Quanto ao sistema, é necessário ter em mente que no mesmo foi utilizado banco de dados, então para que o mesmo funcione é obrigatório uma conexão entre as páginas e o banco. Utilizei do MySql e seus recursos, onde elaborei uma base de dados “loja” contendo algumas tabelas para armazenagem dos dados.
As tabelas foram:
•	clientes;
•	usuário;
•	produtos;
•	vendas;
•	itensvenda;

	
