
const URL_PRODUTOS = "https://raw.githubusercontent.com/hpbonfim/recodepro/master/PROJETOS/PROJETOJS/JSON/produtos.json"
let arrayObjetos = new Array()

/* FUNÇOES */
// carregarListaCategorias
// filtrarCategoria
// mostrarTodosProdutos
// listarObjetos
// limparLista
// verDetalhesProduto
/* ----- */



/* ------------------------------ DOWNLOAD DADOS DO GITHUB ----------------------------- */
/* TODO - CONSUMIR TUDO DE LOCALSTORAGE APÓS DOWNLOAD */
fetch(URL_PRODUTOS)
    .then(res => res.json())
    .then(data => {
        const { produtos } = data

        // Transforma JSON Objects em Arrays e salva local
        Object.entries(produtos).map(todosProdutos => arrayObjetos.push(todosProdutos))

        localStorage.setItem("objetos", JSON.stringify(produtos))
        carregarListaCategorias(), // Carrega a lista de categorias
            mostrarTodosProdutos() // Mostra todos os produtos

    }).catch(err => {
        alert("Verifique sua conexão com a internet e tente novamente!")
        console.error(err)
    })



/* ------------------------------  LISTA DE CATEGORIAS ----------------------------- */
const carregarListaCategorias = () => {
    let listaCategoriasId = document.getElementById('listaCategorias')
    let quantidadeTotal = 0

    arrayObjetos.map((produto, index) => {
        let tituloProduto = produto[0]
        let quantidadeProduto = produto[1].quantidades
        quantidadeTotal += quantidadeProduto
        return listaCategoriasId.innerHTML += `<li><button class="menu-botoes" onclick='filtrarCategoria(${index}, ${index})'>${tituloProduto} <strong>(${quantidadeProduto})</strong></li>`
    })

    listaCategoriasId.innerHTML += `<li><button class="menu-botoes" onclick='mostrarTodosProdutos(${quantidadeTotal})'>Mostrar Tudo <strong>(${quantidadeTotal})</strong></li>`

}


/* ------------------------------  MOSTRAR TODAS AS CATEGORIAS ----------------------------- */
const mostrarTodosProdutos = () => {
    limparLista() // REMOVE TODOS OS BOX DO PRODUTO ANTES DE FILTRAR
    for (let i = 0; i < arrayObjetos.length; i++) { listarObjetos(i, i) }
}


/* ------------------------------  MOSTRAR TODAS AS CATEGORIAS ----------------------------- */
const filtrarCategoria = (categoriaProdutoId, itemId) => {
    limparLista() // REMOVE TODOS OS BOX DO PRODUTO ANTES DE FILTRAR
    listarObjetos(categoriaProdutoId, itemId)
}


/* ------------------------------  FILTRAR CATEGORIAS ----------------------------- */
const listarObjetos = (categoriaProdutoId, itemId) => {
    let categorias = document.getElementById("categorias")
    let array = arrayObjetos[itemId][1]

    array.itens.map(item => {
        categorias.insertAdjacentHTML('afterend', `
        <div class="box-produto">
            <br>
            <img class="imagem-produto" src="${item.imagemProduto}" alt="Geladeira brastemp">
            <hr>
            <br>
            <span class="titulo-produto">
                ${item.tituloProduto}
            </span>
            <p class="descricao">
                <em class="traco">De ${item.precoAntigoProduto}</em>
                <br>
                <br>
                <span>Por apenas:
                    <br>
                    <strong class="preco-atual"> ${item.precoAtualProduto}</strong>
                </span>
                <button onclick="verDetalhesProduto(${categoriaProdutoId}, ${item.id})" class="detalhes-produto">DETALHES</button>
                <button onclick="carrinhoDeCompras(${categoriaProdutoId}, ${item.id})" class="adicionar-carrinho">COLOCAR NO CARRINHO</button>
                <button onclick="comprarProduto(${categoriaProdutoId}, ${item.id})" class="comprar-produto">COMPRAR</button>
            </p>
        </div>
        `
        )
    })
}


/* ------------------------------  LIMPAR LISTA DE FILTRAGEM DOS PRODUTOS ----------------------------- */
const limparLista = () => {
    return document.querySelectorAll('.box-produto').forEach(elemento => elemento.remove())
}


/* ------------------------------  REDIRECIONA PARA PÁGINA DETALHES  ----------------------------- */
const verDetalhesProduto = (categoriaProdutoId, itemId) => {
    let produtoSelecionado = arrayObjetos[categoriaProdutoId][1].itens[itemId]

    sessionStorage.setItem("detalhesProduto", JSON.stringify(produtoSelecionado)) // ARMAZENA O PRODUTO EM SESSÃO

    window.location.href = "detalhe-produto.html"
}

const carrinhoDeCompras = (categoriaProdutoId, itemId) => {
    alert("Funcionalidade em breve")
}

const comprarProduto = (categoriaProdutoId, itemId) => {
    alert("Funcionalidade em breve")
}
