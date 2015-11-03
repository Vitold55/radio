@extends('app')

@section('content')
    <ul>
        <?php foreach ($stations as $station) : ?>
            <li><?=$station['name']?> - <audio src="<?=$station['source']?>" controls></audio></li>
        <?php endforeach; ?>
    </ul>
@stop