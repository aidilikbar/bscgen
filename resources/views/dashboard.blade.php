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

            // Build node map
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

            // Build hierarchy and detect roots
            positions.forEach(pos => {
                if (pos.parent) {
                    nodeMap[pos.parent]?.children.push(nodeMap[pos.id]);
                } else {
                    rootNodes.push(nodeMap[pos.id]);
                }
            });

            // Render each root as a separate tree
            const treeContainer = document.getElementById('tree-container');
            rootNodes.forEach((rootNode, index) => {
                const treeId = `tree-${index}`;
                const treeDiv = document.createElement('div');
                treeDiv.id = treeId;
                treeDiv.classList.add('Treant');
                treeDiv.classList.add('w-full', 'md:w-auto', 'overflow-x-auto');
                treeDiv.style.minWidth = '300px';
                treeDiv.style.flex = '1 1 45%';
                treeContainer.appendChild(treeDiv);

                const chartConfig = {
                    chart: {
                        container: `#${treeId}`,
                        node: { collapsable: true },
                        connectors: { type: 'step' },
                        animation: {
                            nodeAnimation: "easeOutBounce",
                            nodeSpeed: 700,
                            connectorsAnimation: "bounce",
                            connectorsSpeed: 700
                        }
                    },
                    nodeStructure: rootNode
                };

                new Treant(chartConfig);
            });
        });
    </script>

    <style>
        .node-style {
            padding: 10px;
            background-color: white;
            border: 1px solid #cbd5e0;
            border-radius: 6px;
            text-align: center;
            font-weight: 500;
            word-break: break-word;
        }

        #tree-container > div {
            max-width: 100%;
        }

        .Treant {
            min-width: 300px;
        }
    </style>
</x-app-layout>