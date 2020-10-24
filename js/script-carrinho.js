document.addEventListener("DOMContentLoaded", () => {
    carrinhoState()
    location.pathname == '/carrinho.php' ? produtosSelecionadosState() : ""
})

const carrinhoState = () => {
    let carrinho = document.querySelector("#carrinho")
    let contador = sessionStorage.getItem('contador') == null || undefined ? 0 : sessionStorage.getItem('contador')

    carrinhoUpdateState(contador)

    carrinho.innerHTML = contador
}

const carrinhoUpdateState = (contador) => {
    let carrinhoImage = document.querySelector("#carrinhoImage")
    carrinhoImage.src = contador <= 0 ? "../images/carrinho_vazio.png" : "./images/carrinho_cheio.png";
}

const produtosSelecionados = (produtoId) => {
    let produtosEscolhidos = sessionStorage.getItem('produtosSelecionados') == null || undefined ? [] : JSON.parse(sessionStorage.getItem('produtosSelecionados'))
    produtosEscolhidos.push(produtoId)

    let quantidadeProdutos = sessionStorage.getItem('quantidadeProdutos') == null || undefined ? {} : JSON.parse(sessionStorage.getItem('quantidadeProdutos'))
    quantidadeProdutos = produtosEscolhidos.reduce((map, val) => { map[val] = (map[val] || 0) + 1; return map }, {})

    sessionStorage.setItem('produtosSelecionados', JSON.stringify(produtosEscolhidos))
    sessionStorage.setItem('quantidadeProdutos', JSON.stringify(quantidadeProdutos))
}


const adicionarNoCarrinho = (produtoId) => {
    let carrinho = document.querySelector("#carrinho")
    let contador = sessionStorage.getItem('contador') == null || undefined ? 0 : sessionStorage.getItem('contador')

    contador++
    carrinho.innerHTML = contador

    sessionStorage.setItem('contador', contador)
    produtosSelecionados(produtoId)
    carrinhoUpdateState(contador)
    produtosSelecionadosState()
}


const deletarCarrinho = () => {
    let carrinho = document.querySelector("#carrinho")
    let apagar = confirm("Deseja apagar seu carrinho de compras?")

    if (apagar) {
        carrinho.innerHTML = 0
        sessionStorage.clear()
        carrinhoUpdateState(0)
    }
}

const getProdutosSelecionados = () => {
    let quantidadeProdutos = sessionStorage.getItem('quantidadeProdutos') == null || undefined ? {} : JSON.parse(sessionStorage.getItem('quantidadeProdutos'))
    let produtosId = []

    for (let id in quantidadeProdutos) { produtosId.push(id) }

    if (produtosId.length <= 0)
        return;

    sessionStorage.setItem('produtosId', JSON.stringify(produtosId))
    document.getElementById("produtosID").value = sessionStorage.getItem('produtosId')
    document.getElementById("quantidadeProdutoEscolhido").value = JSON.stringify(sessionStorage.getItem('quantidadeProdutos'))
}

const produtosSelecionadosState = () => {
    let quantidadeProdutos = sessionStorage.getItem('quantidadeProdutos') == null || undefined ? {} : JSON.parse(sessionStorage.getItem('quantidadeProdutos'))
    for (let produtoID in quantidadeProdutos) {
        let quantidadeProduto = document.getElementById(`quantidadeProduto_${produtoID}`)
        let precoUnitarioProduto = document.getElementById(`precoProduto_${produtoID}`)
        let precoTotalProduto = document.getElementById(`somaProduto_${produtoID}`)
        
        precoTotalProduto.innerHTML = precoUnitarioProduto.textContent * quantidadeProdutos[produtoID]
        quantidadeProduto.innerHTML = `<input type="number" value="${quantidadeProdutos[produtoID]}" min="1" max="1000" style="width: 50px;" onkeypress="produtosSelecionadosState()">`

    }
}


const removerDoCarrinho = (produtoID) => {
    let carrinho = document.querySelector("#carrinho")
    let contador = sessionStorage.getItem('contador') == null || undefined ? 0 : sessionStorage.getItem('contador')

    contador++
    carrinho.innerHTML = contador

    sessionStorage.setItem('contador', contador)
    produtosSelecionados(produtoId)
    carrinhoUpdateState(contador)
}