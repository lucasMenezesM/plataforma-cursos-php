<?php loadPartial("head"); ?>
<h1>Create Course</h1>

<form action="/cursos" method="post">
    <label for="">name</label>
    <input type="text" name="name" id="">
    <label for="">descricao</label>
    <input type="text" name="description" id="">
    <label for="">carga_horaria</label>
    <input type="text" name="hours_video" id="">
    <label for="">aulas</label>
    <input type="text" name="lessons" id="">
    <label for="">alunos</label>
    <input type="text" name="enrolled_students" id="">
    <button type="submit">Enviar</button>
</form>

<?php loadPartial("footer"); ?>