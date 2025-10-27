Resumo:


No nosso projeto usamos a api ViaCEP ela é uma  api que que permite a consulta de informações relacionadas ao Código de Endereçamento Postal (CEP) no Brasil.

Endpoint:


get:
https://viacep.com.br/ws/{CEP}/json/

bash:
https://viacep.com.br/ws/01001000/json/

exemplo da resposta:


{
  "cep": "01001-000",
  
  "logradouro": "Praça da Sé",
  
  "complemento": "lado ímpar",
  
  "bairro": "Sé",
  
  "localidade": "São Paulo",
  
  "uf": "SP",
  
  "ibge": "3550308",
  
  "gia": "1004",
  
  "ddd": "11",
  
  "siafi": "7107"
  
}


Como rodar o código:


import java.net.http.*;

import java.net.*;

import java.io.IOException;

public class ViaCepExample {

  public static void main(String[] args) throws IOException, InterruptedException {
  
  String cep = "01001000";
  
  String url = "https://viacep.com.br/ws/" + cep + "/json/";
  
  HttpClient client = HttpClient.newHttpClient();
     
   HttpRequest request = HttpRequest.newBuilder()
   
  .uri(URI.create(url))
                
  .GET()
                
  .build()
                
HttpResponse<String> response = client.send(request, HttpResponse.BodyHandlers.ofString());

System.out.println(response.body());
    }
}

Limitações:


API pública, sem necessidade de autenticação.

Pode ocorrer bloqueio temporário em caso de uso abusivo.

Os dados são mantidos pelos Correios e podem não refletir atualizações recentes.

Teste:


import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.*;

import java.net.http.*;

import java.net.*;

class ViaCepTest {
    @Test
    
  void testConsultaCep() throws Exception {
  
  HttpClient client = HttpClient.newHttpClient();
  
  HttpRequest request = HttpRequest.newBuilder()
  
  .uri(URI.create("https://viacep.com.br/ws/01001000/json/"))
  
  .build();
  
  HttpResponse<String> response = client.send(request, HttpResponse.BodyHandlers.ofString());
  
  assertEquals(200, response.statusCode());
  
  assertTrue(response.body().contains("logradouro"));
  
  }
}


como usar:


na parte CADASTRO DO ADM ele informa para inserir o (CEP) do funcionário(a) assim que inserir o CEP ele automaticamente puxa a rua e bairro da pessoa

como testar:


assim que inseriu o cep do funcionário abra o phpadmin e aperte a teclas TAB para puxar as informações e se aparecer ao lado do email o cep e outras informações esta testado 👍
