<div>
    <form wire:submit.prevent="submit">
        <div class="mb-3">
            <x-backend.form.input type="text" name="heading"
                                  required
                                  class="w-full"
                                  name="article.heading"
                                  wire:model.defer="article.heading"
                                  aria-label="Heading"
                                  placeholder="*Heading..."/>
        </div>



        <div class="mb-3">
            <x-backend.form.textarea class="w-full" required
                                     name="article.content"
                                     wire:model.defer="article.content"
                                     aria-label="Content" rows="12"
                                     placeholder="*Content"></x-backend.form.textarea>
        </div>





      

        <x-backend.form.button>Submit</x-backend.form.button>
    </form>
</div>
