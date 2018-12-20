<?php 
	require_once("config.php");
	include(HEADER_TEMPLATE);
?>
    <div class="corpo">
    <div class="conteudo">

    <div class="itens">
        <div class="titulolivro">
            <h1>Laranja Mecânica</h1>
            
        </div>
    </div>
     
    <img src= "imagem/laranjamecanica.jpg" alt="laranjamecanica"  height="70px"/>
    
        <div class="conteudo">
            <p class="livro-specs info-tipo">
                    <span class="info-label"><h6>Tipo:</h6></span>
                        <span itemprop="tipo">Livro</span>
                    </a>
                </p>
            <p class="livro-specs info-autor">
                <span class="info-label"><h6>Autor(a):</h6></span>
                    <span itemprop="autor"> Anthony Burgess </span>
                </a>
            </p>
                 <p class="livro-specs info-edicao">
                    <span class="info-label"><h6>Edição:</h6></span> 
                    <span itemprop="edicao">1</span>
                </p>
            </p> 
               <p class="livro-specs info-isbn">
                    <span class="info-label"><h6>ISBN:</h6></span> 8576570033
                </p>        
                <p class="livro-specs info-descricao">
                        <span class="info-label"><h6>Descricao:</h6></span> 
                        Narrada pelo protagonista, o adolescente Alex, esta brilhante e perturbadora história cria uma sociedade futurista em que a violência atinge proporções gigantescas e provoca uma reposta igualmente agressiva de um governo totalitário.
                        A estranha linguagem utilizada por Alex - soberbamente engendrada pelo autor - empresta uma dimensão quase lírica ao texto.
                        Adaptado com maestria para o cinema em 1972 por Stanley Kubrick, é uma obra marcante.
                    </p>      
         </div>
         <div class="pedido">
           <a href="pedido.php"
                <span class="pedidoProduto"> Realizar Pedido</span> 
           </a/>
       </div> 
              <p class="valorlivro">R$ 25.00</p>

        </div>
     </div>
    </div>

    <br></br>
    <div class="rodape">
        Copyright &COPY; 2018 MeLivro. Todos os Direitos Reservados.
    </div>
</body>
</html>
