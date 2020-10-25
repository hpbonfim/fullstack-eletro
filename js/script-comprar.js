
document.addEventListener("DOMContentLoaded", () => {
  updateAll()
})

const updateAll = () => {
  let idProdutos = getProdutoId()
  let nomeProdutos = []
  let precoUnitarioProduto = []
  let precoTotalProdutos = []
  let quantidadeProdutos = Object.values(getQuantidadeProduto())

  const getDetalhesProdutos = () => {

    let quantidadeProdutos = getQuantidadeProduto()

    for (let produtoID in quantidadeProdutos) {
      let nomeProduto = document.getElementById(`nomeProduto_${produtoID}`).textContent
      let precoUnitarioProduto = document.getElementById(`precoProduto_${produtoID}`).textContent
      let precoTotalProduto = document.getElementById(`somaProduto_${produtoID}`).textContent
      setDetalhesProdutos(nomeProduto, precoUnitarioProduto, precoTotalProduto)
    }
  }

  const setDetalhesProdutos = (nome, preco_unitario, preco_total) => {
    nomeProdutos.push(nome)
    precoUnitarioProduto.push(preco_unitario)
    precoTotalProdutos.push(preco_total)
  }

  const adicionarProdutosFormulario = (id_produtos, nome, preco_unitario, preco_total, quantitade_produtos) => {
    document.getElementById("id_produtos").value = id_produtos
    document.getElementById("nome_produto").value = nome
    document.getElementById("valor_unitario_produto").value = preco_unitario
    document.getElementById("valor_total_produto").value = preco_total
    document.getElementById("quantidade_produto").value = quantitade_produtos
  }

  getDetalhesProdutos()
  adicionarProdutosFormulario(idProdutos, nomeProdutos, precoUnitarioProduto, precoTotalProdutos, quantidadeProdutos)

}



const modalBox = () => {
  return document.getElementById("modalBox")
}

const mostrarModal = () => {
  updateAll()
  modalBox().style.display = "block"
}

const fecharModal = () => {
  modalBox().style.display = "none"
}

window.onclick = (event) => {
  return event.target == modalBox() ? modalBox().style.display = "none" : event
}


// console.log(getQuantidadeProduto())
// console.log(getProdutoId())