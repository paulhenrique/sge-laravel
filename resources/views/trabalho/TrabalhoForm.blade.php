<h1>Submissão de trabalhos</h1>

<form method="post" action="{{ route('create_trabalho')}}">

    @csrf
    
    <label for="localArquivo">Local do arquivo: </label>
    <input type="Text" id="localArquivo" name="localArquivo" placeholder="Começo do nome do arquivo"><br><br>
   
    <label for="trabalhoPdf">Arquivo em PDF</label>
    <input type="file" id="trabalhoPdf" name="trabalhoPdf"><br><br>

    <label for="linkVid">Link para vídeo</label>
    <input type="url" id="linkVid" name="linkVid" placeholder="Link para seu vídeo no YouTube"><br><br>

    <button type="submit">Enviar</button>

</form>