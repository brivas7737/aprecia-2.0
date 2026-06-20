from PyPDF2 import PdfReader
from gtts import gTTS
import sys

if len(sys.argv) < 3:
    print("Uso: python audio_generator.py archivo_pdf salida_mp3")
    exit()

ruta_pdf = sys.argv[1]
salida_mp3 = sys.argv[2]

reader = PdfReader(ruta_pdf)

texto = ""

for pagina in reader.pages:
    contenido = pagina.extract_text()

    if contenido:
        texto += contenido

tts = gTTS(
    text=texto,
    lang="es"
)

tts.save(salida_mp3)

print("Audio generado correctamente")