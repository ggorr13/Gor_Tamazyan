@props(['disabled' => false, 'name' => '', 'feedback' => $errors, 'type' => 'text', 'id' => $name ?? '', 'label' => $name ?? '', 'value' => ''])

<x-forms.input.label :for="$id" :value="$label"/>

<x-forms.input.fields :type="$type" :name="$name" :value="$value" :id="$id" :disabled="$disabled"/>

<x-forms.input.error :name="$name" :feedback="$feedback"/>
