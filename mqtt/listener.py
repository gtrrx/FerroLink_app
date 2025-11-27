import paho.mqtt.client as mqtt
import ssl
import time
import os

BROKER = "bc22b334176b4d99a8a12258d143ce6c.s1.eu.hivemq.cloud"
PORT = 8883
TOPIC = "trem/comando"

ARQUIVO = r"C:\xampp\htdocs\giovanni_atividades_php\php\atividades\ferrilink\FerroLink_app\mqtt\mensagens_mqtt.txt"
os.makedirs(os.path.dirname(ARQUIVO), exist_ok=True)

# ======== AUTENTICAÇÃO OBRIGATÓRIA (HiveMQ Cloud) ========
USERNAME = "teste1"
PASSWORD = "Teste_12"

def on_connect(client, userdata, flags, rc):
    if rc == 0:
        print("Conectado ao broker com sucesso!")
        client.subscribe(TOPIC)
    else:
        print("Falha ao conectar, código:", rc)

def on_message(client, userdata, msg):
    mensagem = msg.payload.decode()
    linha = f"[{time.strftime('%H:%M:%S')}] {mensagem}\n"
    print(linha)

    with open(ARQUIVO, "a", encoding="utf-8") as f:
        f.write(linha)

client = mqtt.Client()

# autenticação
client.username_pw_set(USERNAME, PASSWORD)

client.on_connect = on_connect
client.on_message = on_message

# configuração TLS obrigatória
client.tls_set(cert_reqs=ssl.CERT_NONE)
client.tls_insecure_set(True)

print("Conectando ao HiveMQ Cloud...")
client.connect(BROKER, PORT, keepalive=60)

print("Aguardando mensagens...")
client.loop_forever()
