@props(['tagsCsv'])
@php
$tags = explode('#', substr($tagsCsv, 1));
 @endphp   
 <div class="d-flex">
    @foreach ($tags as $tag)
  <a  class = 'text-dark nav-link ' href="?tag={{$tag}}">#{{$tag}}</a> 
  @endforeach 
 </div>