<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Organizational Chart</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">
        <div id="tree-container" class="flex flex-wrap justify-start gap-8 px-6 pb-6"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const positions = @json($nodes);
            const nodeMap = {};
            const rootNodes = [];

            positions.forEach(pos => {
                nodeMap[pos.id] = {
                    text: {
                        name: pos.name,
                        title: pos.business_unit
                    },
                    HTMLclass: 'node-style',
                    children: []
                };
            });

            positions.forEach(pos => {
                if (pos.parent) {
                    nodeMap[pos.parent]?.children.push(nodeMap[pos.id]);
                } else {
                    rootNodes.push(nodeMap[pos.id]);
                }
            });

            const treeContainer = document.getElementById('tree-container');
            rootNodes.forEach((rootNode, index) => {
                const treeId = `tree-${index}`;
                const treeDiv = document.createElement('div');
                treeDiv.id = treeId;
                treeDiv.classList.add('flex-grow');

                treeContainer.appendChild(treeDiv);

                new Treant({
                    chart: {
                        container: `#${treeId}`,
                        node: {
                            collapsable: true
                        },
                        animation: {
                            nodeAnimation: "easeOutBounce",
                            nodeSpeed: 700,
                            connectorsAnimation: "bounce",
                            connectorsSpeed: 700
                        },
                        callback: {
                            onToggleCollapseFinished: function(node) {
                                const el = node.DOM.collapseToggle;
                                if (el) {
                                    el.innerHTML = node.collapsed ? '<i class="fas fa-plus-circle text-gray-700"></i>' : '<i class="fas fa-minus-circle text-gray-700"></i>';
                                }
                            }
                        }
                    },
                    nodeStructure: rootNode
                });
            });
        });
    </script>

    <style>
        .Treant > .node {
            padding: 4px 8px;
        }
        .Treant > .node .collapse-switch {
            right: -14px !important;
            top: 10px !important;
            width: 24px;
            height: 24px;
            background: none !important;
            border: none;
        }
        .Treant > .node .collapse-switch i {
            font-size: 20px;
            cursor: pointer;
        }
        .Treant > .node .collapse-switch::before {
            display: none;
        }
    </style>
</x-app-layout>