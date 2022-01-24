<label for="files">
  {{__('Fichier :', 'attractive-block')}}
  @include('blocks.partials.steps-form.error-msg')
  <input type="file" name="file" id="file" class="inputfile" />
  <label for="file"><span>{{__('Choisir une image', 'attractive-block')}}</span></label>
    <img id="output"/>
</label>
