from PyPDF2 import PdfReader

# Diccionario básico Braille
braille = {
    "a":"⠁","b":"⠃","c":"⠉","d":"⠙","e":"⠑",
    "f":"⠋","g":"⠛","h":"⠓","i":"⠊","j":"⠚",
    "k":"⠅","l":"⠇","m":"⠍","n":"⠝","o":"⠕",
    "p":"⠏","q":"⠟","r":"⠗","s":"⠎","t":"⠞",
    "u":"⠥","v":"⠧","w":"⠺","x":"⠭","y":"⠽",
    "z":"⠵"," ":" "
}

ruta_pdf = "documentos/matematica_basica.pdf"

reader = PdfReader(ruta_pdf)

texto = ""

for pagina in reader.pages:
    contenido = pagina.extract_text()
    if contenido:
        texto += contenido.lower()

texto_braille = ""

for letra in texto:
    texto_braille += braille.get(letra, letra)

with open("braille/prueba_braille.txt", "w", encoding="utf-8") as archivo:
    archivo.write(texto_braille)

print("Archivo Braille generado correctamente")