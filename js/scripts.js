function senhaValida($password) {
    return preg_match('/[a-z]/', $senha)
     || preg_match('/[A-Z]/', $senha) // tem pelo menos uma letra maiúscula ou minúscula
     && preg_match('/[0-9]/', $senha) // tem pelo menos um número
     && preg_match('/^[\w$@]{4,}$/', $senha); // tem 4 ou mais caracteres
}
