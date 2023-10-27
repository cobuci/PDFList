<div>
    <x-button info label="Criar Tabela" wire:click="dialogCreate"/>
    <x-dialog id="groupDialog" title="Criar nova tabela">
        <x-input label="Nome da Tabela" placeholder="Insira o nome da tabela" wire:model="name"/>
        <x-input label="Descrição" placeholder="Insira a descrição da tabela" wire:model="description"/>
    </x-dialog>
</div>
