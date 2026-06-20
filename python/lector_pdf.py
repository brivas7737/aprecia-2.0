from PyPDF2 import PdfReader
import pyttsx3

ruta_pdf = "documentos/matematica_basica.pdf"

reader = PdfReader(ruta_pdf)

texto = ""

for pagina in reader.pages:
    contenido = pagina.extract_text()

    if contenido:
        texto += contenido

print(texto)

engine = pyttsx3.init()

engine.say(texto)

engine.runAndWait()