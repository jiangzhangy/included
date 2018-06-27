var IMGDIR = '/tour/comm_data/images/tree';
var tree_root_id = 0;
var icon = new Object();
icon.root		= IMGDIR + '/tree_root.gif';
icon.folder		= IMGDIR + '/tree_folder.gif';
icon.folderOpen		= IMGDIR + '/tree_folderopen.gif';
icon.file		= IMGDIR + '/tree_file.gif';
icon.empty		= IMGDIR + '/tree_empty.gif';
icon.line		= IMGDIR + '/tree_line.gif';
icon.lineMiddle		= IMGDIR + '/tree_linemiddle.gif';
icon.lineBottom		= IMGDIR + '/tree_linebottom.gif';
icon.plus		= IMGDIR + '/tree_plus.gif';
icon.plusMiddle		= IMGDIR + '/tree_plusmiddle.gif';
icon.plusBottom		= IMGDIR + '/tree_plusbottom.gif';
icon.minus		= IMGDIR + '/tree_minus.gif';
icon.minusMiddle	= IMGDIR + '/tree_minusmiddle.gif';
icon.minusBottom	= IMGDIR + '/tree_minusbottom.gif';

function treeNode(id, pid, name, url, target, open) {
	//public
	var obj = new Object();
	obj.id = id;
	obj.pid = pid;
	obj.name = name;
	obj.url = url;
	obj.target = target;
	obj.open = open;
	//private
	obj._isOpen = open;
	obj._lastChildId = 0;
	obj._pid = 0;
	return obj;
}

function dzTree(treeName) {
	this.nodes = new Array();
	//this.openIds = getcookie('leftmenu_openids');
	this.pushNodes = new Array();
	this.addNode = function(id, pid, name, url, target, open) {
		var theNode = new treeNode(id, pid, name, url, target, open);
		this.pushNodes.push(id);
		if(!this.nodes[pid]) {
			this.nodes[pid] = new Array();
		}
		this.nodes[pid]._lastChildId = id;

		for(k in this.nodes) {
			//if(this.openIds && this.openIds.indexOf('_' + theNode.id) != -1) {
			//	theNode._isOpen = true;
			//}
			if(this.nodes[k].pid == id) {
				theNode._lastChildId = this.nodes[k].id;
			}
		}
		this.nodes[id] = theNode;
	}

	this.show = function() {
		var s = this.createTree(this.nodes[tree_root_id]);
		document.write(s);
	}

	this.createTree = function(node, padding) {
	   var s = '';
		padding = padding ? padding : '';
		if(node.id == tree_root_id){
			//var icon1 = '<li class="header" id="node_' + node.id + '" style="text-align: center;"><a href="javascript:void(0);">'+this.getName(node)+'</a></li>';
            var icon1 = '<ul class="nav nav-tabs nav-stacked">';
		} else {
			//var icon1 = '<img src="' + this.getIcon1(node) + '" onclick="' + treeName + '.switchDisplay(\'' + node.id + '\')" id="icon1_' + node.id + '" style="cursor: pointer;">';
            var icon1 = '<li class="header" id="node_' + node.id + '">'+this.getName(node)+'</li>';
		}
		s += icon1;
        for(k in this.pushNodes) {
			var id = this.pushNodes[k];
			var theNode = this.nodes[id];
			if(theNode.pid == node.id) {
				if(!theNode._lastChildId) {
					s += '<li id="node_' + theNode.id + '">'+ this.getName(theNode) +'</li>';
				} else {
				    s += '<ul class="nav nav-tabs nav-stacked">';
				    s += this.createTree(theNode, '');
                    s += '</ul>';
				}
			}
		}
        if(node.id == tree_root_id){
            s += '</ul>';
        }
		return s;
	}

	this.getIcon1 = function(theNode) {
		var parentNode = this.nodes[theNode.pid];
		var src = '';
		if(theNode._lastChildId) {
			if(theNode._isOpen) {
				if(theNode.id == tree_root_id) {
					return icon.minus;
				}
				if(theNode.id == parentNode._lastChildId) {
					src = icon.minusBottom;
				} else {
					src = icon.minusMiddle;
				}
			} else {
				if(theNode.id == tree_root_id) {
					return icon.plus;
				}
				if(theNode.id == parentNode._lastChildId) {
					src = icon.plusBottom;
				} else {
					src = icon.plusMiddle;
				}
			}
		} else {
			if(theNode.id == parentNode._lastChildId) {
				src = icon.lineBottom;
			} else {
				src = icon.lineMiddle;
			}
		}
		return src;
	}

	this.getIcon2 = function(theNode) {
		var src = '';
		if(theNode.id == tree_root_id ) {
			return icon.root;
		}
		if(theNode._lastChildId) {
			if(theNode._isOpen) {
				src = icon.folderOpen;
			} else {
				src = icon.folder;
			}
		} else {
			src = icon.file;
		}
		return src;
	}

	this.getName = function(theNode) {
		if(theNode.url) {
			return '<a href="'+theNode.url+'" target="' + theNode.target + '"> '+theNode.name+'</a>';
		} else {
			return '<a href="javascrpt:void(0);" target="' + theNode.target + '"> '+theNode.name+'</a>';
		}
	}

	this.switchDisplay = function(nodeId) {
		eval('var theTree = ' + treeName);
		var theNode = theTree.nodes[nodeId];
		if(document.getElementById('nodes_' + nodeId).style.display == 'none') {
			theTree.openIds = updatestring(theTree.openIds, nodeId);
			setcookie('leftmenu_openids', theTree.openIds, 8640000000);
			theNode._isOpen = true;
			document.getElementById('nodes_' + nodeId).style.display = '';
			if(nodeId!=tree_root_id)
				document.getElementById('icon1_' + nodeId).src = theTree.getIcon1(theNode);
			document.getElementById('icon2_' + nodeId).src = theTree.getIcon2(theNode);
		} else {
			theTree.openIds = updatestring(theTree.openIds, nodeId, true);
			setcookie('leftmenu_openids', theTree.openIds, 8640000000);
			theNode._isOpen = false;
			document.getElementById('nodes_' + nodeId).style.display = 'none';
			if(nodeId!=tree_root_id) 
				document.getElementById('icon1_' + nodeId).src =  theTree.getIcon1(theNode);
			document.getElementById('icon2_' + nodeId).src = theTree.getIcon2(theNode);

		}
	}
}
