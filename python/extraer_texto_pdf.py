from PyPDF2 import PdfReader
import sys

pdf = sys.argv[1]

reader = PdfReader(pdf)

texto = ""

for pagina in reader.pages:
    texto += pagina.extract_text() or ""

print(texto.encode('utf-8', errors='ignore').decode('utf-8'))