<!DOCTYPE html>
<html>
<head>
    <title>Test Story Media</title>
</head>
<body>
    <h1>Test: The Origin of the Rainbow</h1>

    <h2>Video (Background/Autoplay)</h2>
    @if($story->video_url)
        <video width="640" autoplay muted loop playsinline>
            <source src="{{ $story->video_url }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    @else
        <p>No video path set.</p>
    @endif

    <h2>Audio Narration</h2>
    @if($story->audio_url)
        <audio controls>
            <source src="{{ $story->audio_url }}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    @else
        <p>No audio path set.</p>
    @endif

    <p>Debug URLs:<br>
       Video: {{ $story->video_url ?? 'N/A' }}<br>
       Audio:  {{ $story->audio_url ?? 'N/A' }}
    </p>
</body>
</html>