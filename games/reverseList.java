/**
 * Definition for singly-linked list.
 * public class ListNode {
 *     int val;
 *     ListNode next;
 *     ListNode(int x) { val = x; }
 * }
 */
public class Solution {
    public ListNode reverseList(ListNode head) {
    ListNode first = null;
    ListNode tail = head;
    while (tail != null) {
        ListNode tmp = tail;
        tail = tail.next;
        tmp.next = first;
        first = tmp;
    }
    return first;
}
}