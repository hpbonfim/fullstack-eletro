document.addEventListener("DOMContentLoaded", () => {
    carrinhoState()
    produtosSelecionadosState()
})


const carrinhoState = () => {
    let carrinho = document.querySelector("#carrinho")
    let quantidadeProdutos = getQuantidadeProduto()
    let contador = 0

    for (let i in quantidadeProdutos) {
        contador += quantidadeProdutos[i]
    }

    let carrinhoImage = document.querySelector("#carrinhoImage")
    carrinhoImage.src = contador <= 0 ? "../images/carrinho_vazio.png" : "./images/carrinho_cheio.png";

    carrinho.innerHTML = contador
}

const produtosSelecionadosState = () => {
    if (location.pathname != '/carrinho.php')
        return;

    let quantidadeProdutos = getQuantidadeProduto()

    for (let produtoID in quantidadeProdutos) {
        let quantidadeProduto = document.getElementById(`quantidadeProduto_${produtoID}`)
        let precoUnitarioProduto = document.getElementById(`precoProduto_${produtoID}`)
        let precoTotalProduto = document.getElementById(`somaProduto_${produtoID}`)

        precoTotalProduto.innerHTML = precoUnitarioProduto.textContent * quantidadeProdutos[produtoID]
        quantidadeProduto.innerHTML = `<input type="number" value="${quantidadeProdutos[produtoID]}" min="1" max="1000" style="width: 50px;" disabled>`
    }
}

const getQuantidadeProduto = () => {
    return sessionStorage.getItem('quantidadeProdutos') == null || sessionStorage.getItem('quantidadeProdutos') == undefined ? {} : JSON.parse(sessionStorage.getItem('quantidadeProdutos'))
}

const getProdutosSelecionados = () => {
    return sessionStorage.getItem('produtosSelecionados') == null || sessionStorage.getItem('produtosSelecionados') == undefined ? [] : JSON.parse(sessionStorage.getItem('produtosSelecionados'))
}

const getListaQuantidadeTotal = (produtosEscolhidos) => {
    return produtosEscolhidos.reduce((map, val) => { map[val] = (map[val] || 0) + 1; return map }, {})
}

const getProdutosId = (listarQuantidadeProdutos) => {
    let produtosId = []
    for (let id in listarQuantidadeProdutos) { produtosId.push(id) }

    if (produtosId.length <= 0)
        return 0

    return produtosId
}

const setProdutosSelecionados = (produtoId, method) => {
    let quantidadeProdutos = getQuantidadeProduto()
    let produtosSelecionados = getProdutosSelecionados()

    const setAll = (produtos_escolhidos, quantidade_produtos, id_produto) => {
        sessionStorage.setItem('produtosSelecionados', JSON.stringify(produtos_escolhidos))
        sessionStorage.setItem('quantidadeProdutos', JSON.stringify(quantidade_produtos))
        sessionStorage.setItem('produtosId', JSON.stringify(id_produto))
    }

    switch (method) {
        case "adicionar":

            produtosSelecionados.push(produtoId)

            setAll(produtosSelecionados, getListaQuantidadeTotal(produtosSelecionados), getProdutosId(getListaQuantidadeTotal(produtosSelecionados)))
            carrinhoState()
            produtosSelecionadosState()
            break;

        case "remover":

            if (quantidadeProdutos[produtoId] > 1) {

                let removerId = produtosSelecionados.indexOf(produtoId)
                removerId >= 0 ? produtosSelecionados.splice(removerId, 1) : null

                setAll(produtosSelecionados, getListaQuantidadeTotal(produtosSelecionados), getProdutosId(getListaQuantidadeTotal(produtosSelecionados)))
                produtosSelecionadosState()
                carrinhoState()
            }
            break;

        case "retirar":
            let confirmar = confirm('Deseja remover este produto da lista?')

            if (confirmar) {

                setAll(produtosSelecionados, getListaQuantidadeTotal(produtosSelecionados), getProdutosId(getListaQuantidadeTotal(produtosSelecionados)))
                postProdutosSelecionados()
                carrinhoState()
            }
            break;
    }
}

const adicionarNoCarrinho = (produtoId) => {
    const method = "adicionar"
    setProdutosSelecionados(produtoId, method)
}

const removerDoCarrinho = (produtoId) => {
    const method = "remover"
    setProdutosSelecionados(produtoId, method)
}

const removerProduto = (produtoId) => {
    const method = "retirar"
    setProdutosSelecionados(produtoId, method)
}

const deletarCarrinho = () => {
    let apagar = confirm("Deseja apagar seu carrinho de compras?")

    if (apagar) {
        sessionStorage.clear()
        window.location.pathname = '/carrinho.php'
    }
}

const postProdutosSelecionados = () => {

    let formulario, produtoId, quantidadeProdutos
    // Criando um <form>
    formulario = document.createElement('form')
    formulario.action = 'carrinho.php'
    formulario.method = 'post'

    // Criação de um elemento (produtoId) para adicionar um valor ao form
    produtoId = document.createElement('input')
    produtoId.type = 'hidden'
    produtoId.name = 'produtosId'
    produtoId.value = getProdutosId()

    // Criação de um elemento (quantidadeProdutos) para adicionar um valor ao form
    quantidadeProdutos = document.createElement('input')
    quantidadeProdutos.type = 'hidden'
    quantidadeProdutos.name = 'quantidadeProdutos'
    quantidadeProdutos.value = JSON.stringify(sessionStorage.getItem('quantidadeProdutos'))

    // Juntando tudo ao forms
    formulario.appendChild(produtoId)
    formulario.appendChild(quantidadeProdutos)

    // Adicionando no fake container
    document.getElementById('fake-form-container').appendChild(formulario)

    // submit para o php
    formulario.submit()
}
