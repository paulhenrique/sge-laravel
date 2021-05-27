<h1>Submissão de trabalho para {{$Apelido}}</h1>

<form method="post" action="{{ route('create_trabalho')}}" enctype="multipart/form-data">

    @csrf
    <input type="hidden" name="Apelido" value="{{$Apelido}}">

    <label for="nome">nome trabalho: </label>
    <input type="text" id="nome" name="nome" placeholder="nome do trabalho"><br><br>

    <label for="autor">Autor: </label>
    <input type="text" id="autor" name="autor" placeholder="Nome do autor principal"><br><br>

    <label for="coautores">Coautores: </label>
    <input type="text" id="coautores" name="coautores" placeholder="Nome dos coautores"><br><br>
   
    <label for="trabalhoPdf">Arquivo em PDF</label>
    <input type="file" id="trabalhoPdf" name="trabalhoPdf"><br><br>

    <label for="diarioPdf">Diário de bordo em PDF</label>
    <input type="file" id="diarioPdf" name="diarioPdf"><br><br>

    <label for="linkVid">Link para vídeo</label>
    <input type="url" id="linkVid" name="linkVid" placeholder="Link para seu vídeo no YouTube"><br><br>

    <button type="submit">Enviar</button>

</form>